<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllCartLiveWireComponent extends Component
{ 
    use WithPagination;
    public $CartItems=[];
    public $interestedBooks=[]; 
    public $Coupon="";
    #[On('AddOrRemoveFromCart')]
    public function render()
    {
        $this->fetchCartItems();
        $this->fetchIntrestedBooks();

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
        $this->CartItems=$Books;

        

    }
    public function fetchIntrestedBooks()
    {
        $cart = session()->get('cart', []);
        $Subcats=[];
        foreach ($cart as $item) {
            $id = $item['id'];
            $book=Book::find($id);
            if ($book) {
                $Subcats[] = $book->subcategory_id;
            }

        }
        $Books = DB::table('books')->whereIn('subcategory_id',$Subcats)->get();
        
        $this->interestedBooks=$Books;

        

    }
    public function updateCartQuantity($index){
        //updating session
        $Cart=session()->get('cart');
        if ($Cart[$index]) {
            //updating  cart
            $Cart[$index]['quantity']=$this->CartItems[$index]['quantity'];
            session()->put('cart',$Cart);
       
        }

    }
    public function ApplyCoupon(){
        $copun=$this->Coupon;
    }
    public function  removeFromCart($id) {
        $this->dispatch('AddOrRemoveFromCart',$id);
    }
}
