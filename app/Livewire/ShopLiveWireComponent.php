<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookCategory;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShopLiveWireComponent extends Component
{ 
    public $Data = [];

    public $ASubCategory = '';
    public $AColor = '';
    public $AManufacturer = '';
    public $APriceMin = 0.00;
    public $APriceMax = 3000.00;


    public function render()
    {
        $this->FetchCategories();
        $this->FetchColors();
        $this->FetchManufacturers();
        $this->FetchBooks();

        return view('livewire.shop-live-wire-component');
    }

   
    // functions
    public function FetchManufacturers()
    {
        $this->Data['Manufacturers'] = Book::select('manufacturer as ManufacturerName', DB::raw('count(*) as NoOfBooks'))
            ->groupBy('manufacturer')
            ->get();
    }
    public function FetchColors()
    {
        $this->Data['Colors'] = Book::select('color as ColorName', DB::raw('count(*) as NoOfBooks'))
            ->groupBy('color')
            ->get();
    }
    public function FetchCategories()
    {
        $this->Data['Categories'] = BookCategory::with('subcategories')->has('subcategories')->get();
   
    }
    public function FetchBooks()
    {
        $this->Data['Books'] = Book::with('author')
            ->whereHas('subCategory', function ($query) {
                $query->where('name', 'like', '%' . $this->ASubCategory . '%');
            })
            ->where('color', 'like', '%' . $this->AColor . '%')
            ->where('manufacturer', 'like', '%' . $this->AManufacturer . '%')
            ->whereBetween('priceInUSD', [(float)$this->APriceMin,(float) $this->APriceMax])
            ->get();
    }


    //setters
    public function SetSubCategoryTo(string $CategoryName)
    {
        $this->ASubCategory = $CategoryName;
    }
    public function SetColorTo(string $ColorName)
    {
        $this->AColor = $ColorName;
    }
    public function SetManufacturerTo(string $Manufacturer)
    {
        $this->AManufacturer = $Manufacturer;
    }
}
