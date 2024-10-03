<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class AddToCartBtn extends Component
{
    public $isInCart = false;
    public $BookId;
    public $ComponentUpdated = false;
    public $quantity = 1;
    public function render()
    {
        $this->checkInCart();
        return view('livewire.add-to-cart-btn');
    }


    function HandleCart() { 
   
        $this->dispatch('AddOrRemoveFromCart',$this->BookId,$this->quantity);
    }







    #[On('AddOrRemoveFromCart')]
    public function checkInCart()
    {
        if (session()->has('cart')) {
            foreach (session()->get('cart') as $item) {
                if ($item['id'] == $this->BookId) {
                    $this->isInCart = true;
                    $this->quantity = $item['quantity'];
                    $this->dispatch('StopLoading');
                    return;
                }
            }
            $this->dispatch('StopLoading');
            $this->isInCart = false;
            return;
        } else {
            $this->dispatch('StopLoading');
            $this->isInCart = false;
        }
    }

    public function mount($id)
    {

        $this->BookId = $id;
    }
}
