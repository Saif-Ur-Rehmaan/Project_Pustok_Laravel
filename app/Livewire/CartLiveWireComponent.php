<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\wishList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartLiveWireComponent extends Component
{
    public $TotalPrice = 0.00;
    public $Books = [];
    #[On('RenderCartListAgain')]
    public function render()
    {
        // Get the cart from the session or an empty array if it doesn't exist
        $cart = session()->get('cart', []);

        // Reset the books and total price for recalculation
        $this->Books = [];
        $this->TotalPrice = 0.00;

        // Loop through the cart items
        if (count($cart) != 0) {
            foreach ($cart as $item) {
                $book = Book::find($item['id']); // Find the book by its ID

                if ($book) {
                    // Add book and its quantity to the Books array
                    $this->Books[] = [
                        'book' => $book,
                        'quantity' => $item['quantity']
                    ];

                    // Calculate the price with or without discount
                    if ($book->discountPercent != 0) {
                        $price = ($book->priceInUSD * (1 - $book->discountPercent / 100)) * $item['quantity'];
                    } else {
                        $price = $book->priceInUSD * $item['quantity'];
                    }

                    // Add the calculated price to the total
                    $this->TotalPrice += $price;
                }
            }
        }

        return view('livewire.cart-live-wire-component');
    }
    public function removeFromCart($id)
    {
        $this->dispatch('AddOrRemoveFromCart', $id);
    }
    //listeners
    #[On('AddOrRemoveFromCart')]
    public function AddToCart($id, $quantity = 1)
    {

        // Get the current cart session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the item is already in the cart
        $index = array_search($id, array_column($cart, 'id'));
       
        if ($index !== false) {
            // If the item exists, remove it from the cart (this is like "removing from cart")
            unset($cart[$index]);
            $cart = array_values($cart); // Reset the array indices after removing the item

            session()->put('cart', $cart);  
            $message='Item Removed From Cart SuccessFully';
            $this->dispatch('ManageRemoveAlert', $message);
            return;
        } else {
            // If the item is not in the cart, add it to the cart
            $cart[] = [
                'id' => $id,
                'quantity' => $quantity
            ];
            
            session()->put('cart', $cart);
            $message='Item Added To Cart SuccessFully';
            $this->dispatch('ManageAddedAlert',$message);
            return;
        }
    }
    #[On('AddOrRemoveFromWishlist')]
    function ManageWishlist($book_id)
    {
        if (!Auth::check()) {
            return redirect('/login-register')->with('fail', 'You need to login first');
        }

        $wishlist = WishList::where('user_id', Auth::id())
            ->where('book_id', $book_id)
            ->first();

        $message =  '';
        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            $message='Item Removed From Wishlist SuccessFully';
            $this->dispatch('StopLoading');
            $this->dispatch('ManageRemoveAlert', $message);
            
            return;
        } else {
            // Add to wishlist
            WishList::create([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
            ]);
            $message='Item Added To Wishlist SuccessFully';
            $this->dispatch('StopLoading');
            $this->dispatch('ManageAddedAlert',$message);
            return;
        }
    }
}
