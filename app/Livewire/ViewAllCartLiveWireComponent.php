<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllCartLiveWireComponent extends Component
{
    use WithPagination;
    public $CartItems = [];
    public $interestedBooks = [];
    public $Coupon = "";
    public $subTotal = 0.00;
    public $couponDiscount = 0.00;
    #[On('AddOrRemoveFromCart')] 
    public function render()
    {
        $this->fetchCartItems();
        $this->fetchIntrestedBooks();
        $this->calculateSummary();

        return view('livewire.view-all-cart-live-wire-component');
    }
    public function fetchCartItems()
    {
        $cart = session()->get('cart', []);
        $Books = [];
        foreach ($cart as $item) {
            $id = $item['id'];
            $quantity = $item['quantity'];
            $Books[] = [
                'book' => Book::find($id),
                'quantity' => $quantity
            ];
        }
        $this->CartItems = $Books;
    }
    public function fetchIntrestedBooks()
    {
        $cart = session()->get('cart', []);
        $Subcats = [];
        $bookIds = [];
        foreach ($cart as $item) {
            $id = $item['id'];
            $bookIds[] = $id;
            $book = Book::find($id);
            if ($book) {
                $Subcats[] = $book->subcategory_id;
            }
        }
        $Books = DB::table('books')->join('users', 'users.id', '=', 'books.Author_id')->whereNotIn('books.id', $bookIds)->whereIn('subcategory_id', $Subcats)->get(['books.*', 'users.displayName as author']);

        $this->interestedBooks = $Books;
    }
    public function updateCartQuantity($index)
    {
        //updating session
        $Cart = session()->get('cart');
        if ($Cart[$index]) {
            //updating  cart
            $Cart[$index]['quantity'] = $this->CartItems[$index]['quantity'];
            session()->put('cart', $Cart);
        }
        $this->dispatch('RenderCartListAgain');
    }
    public function calculateSummary()
    {
        $this->couponDiscount=0;
        $this->subTotal=0;
        foreach ($this->CartItems as $item) {
            $book = $item['book'];
            $price = 0;
            // Calculate the price with or without discount
            if ($book->discountPercent != 0) {
                $price = ($book->priceInUSD * (1 - $book->discountPercent / 100)) * $item['quantity'];
            } else {
                $price = $book->priceInUSD * $item['quantity'];
            } 
            $this->subTotal += $price;
        }
        if (session()->has('coupon')) {
            if (session()->get('coupon')['applied']) {
                $coupon = session()->get('coupon')['coupon'];

                if ($coupon->type == 'fixed') {
                    $this->couponDiscount = $coupon->discount;
                } else if ($coupon->type == 'percent') {
                    $price = ($coupon->discount/100) * $this->subTotal;
                    $this->couponDiscount = $price;
                }
            }
        }
        $this->subTotal;
    }
    public function ApplyCoupon()
    {
        if (Auth::guest()) {
            return redirect('/login-register')->with('fail', 'You Need To Login First Before Applying Coupon');
        }
        $coupon = $this->Coupon;
        $CouponFromDB = Coupon::where('code', $coupon)->first();
        if ($CouponFromDB) {
            //check if its expired or not
            if ($CouponFromDB->expiry_date && !Carbon::parse($CouponFromDB->expiry_date)->isPast()) {
                session()->put('coupon', [
                    'applied' => true,
                    'coupon' => $CouponFromDB
                ]);
                return redirect('/cart')->with('success', "Token Applied");
            } else {
                return redirect('/cart')->with('fail', "Token expired");
            }
        }
        return redirect('/cart')->with('fail', "invalid token");
    }

    //cart management Functions
    public function removeFromCart($id)
    {
        $this->dispatch('AddOrRemoveFromCart', $id);
    }
    public function AddToCart($id)
    {
        $this->dispatch('AddOrRemoveFromCart', $id);
    }
    public function OpenQuickViewModel($id)
    {
        $this->dispatch('OpenProductModal', $id);
    }
}
