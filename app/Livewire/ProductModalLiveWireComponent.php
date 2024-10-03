<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductModalLiveWireComponent extends Component
{

    public $ProductId = 1;
    public $Loading = true;


    public function render()
    {
        if ($this->ProductId) {
            $Book = Book::find($this->ProductId);
        } else {
            $Book = Book::all()->first();
        }

        return view('livewire.product-modal-live-wire-component', compact('Book'));
    }



    public function CloseProductModal()
    {
        $this->Loading = true;
        }



    //Listner
    #[On('CloseProductModal')]
    function setLoading()
    {
        $this->Loading = true;
    }
    #[On('StopLoading')]
    function StopLoading()
    {
        $this->Loading = false;
    }
    #[On('OpenProductModal')]
    function setProductId(int $id)
    {
        $this->ProductId = $id;
        $this->Loading = false;
    }
}
