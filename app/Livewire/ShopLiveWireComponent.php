<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShopLiveWireComponent extends Component
{
    public $Data = [];
    // 
    public $ASubCategory = '';

    public function render()
    {
        $this->Data['Categories'] = BookCategory::with('subcategories')->has('subcategories')->get();

        $this->Data['Manufacturers'] = Book::select('manufacturer as ManufacturerName', DB::raw('count(*) as NoOfBooks'))
            ->groupBy('manufacturer')
            ->get();

        $this->Data['Colors'] = Book::select('color as ColorName', DB::raw('count(*) as NoOfBooks'))
            ->groupBy('color')
            ->get();
        $this->Data['Books'] = Book::with('author')
            ->whereHas('subCategory', function ($query) {
                $query->where('name', 'like', '%' . $this->ASubCategory . '%');
            })
            ->get();
        return view('livewire.shop-live-wire-component');
    }
    public function SetSubCategoryTo(string $CategoryName) {
        $this->ASubCategory=$CategoryName;
    }
}
