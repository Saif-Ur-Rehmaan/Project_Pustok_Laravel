<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookSubCategory;
use Database\Seeders\BookSubCategorySeeder;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Ramsey\Uuid\Type\Integer;

use function PHPSTORM_META\type;

class ShopLiveWireComponent extends Component
{
    use WithPagination;


    public $Data = [];

    public $ASubCategory = '';
    public $AColor = '';
    public $AManufacturer = '';
    public $APriceMin = 0.00;
    public $APriceMax = 3000.00;
    public $SortBy = '';
    public $BookPagination = [
        'Showing' => 1,
        'To' => 9,
        'Of' => 14,
        'Pages' => 2,
        'NoOfBooksTOShowInOnePage' => 12
    ];

    public function render()
    {
        $this->FetchCategories();
        $this->FetchColors();
        $this->FetchManufacturers();
        $Books = $this->FetchBooks();
        $this->BookPagination['Showing'] = ($Books->currentPage() - 1) * $Books->perPage() + 1;
        $this->BookPagination['To'] = min($Books->currentPage() * $Books->perPage(), $Books->total());
        $this->BookPagination['Of'] = $Books->total();
        $this->BookPagination['Pages'] = $Books->lastPage();
        $this->BookPagination['NoOfBooksTOShowInOnePage'] = $Books->perPage();
        
 

        return view('livewire.shop-live-wire-component', compact('Books'));
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
        $query = Book::with('author')
            ->whereHas('subCategory', function ($query) {
                $query->where('name', 'like', '%' . $this->ASubCategory . '%');
            })
            ->where('color', 'like', '%' . $this->AColor . '%')
            ->where('manufacturer', 'like', '%' . $this->AManufacturer . '%')
            ->whereBetween('priceInUSD', [(float)$this->APriceMin, (float) $this->APriceMax]);

        // Apply sorting based on the SortBy value
        switch ($this->SortBy) {
            case 'Sort By:Name (A - Z)':
                $query->orderBy('title', 'asc');
                break;
            case 'Sort By:Name (Z - A)':
                $query->orderBy('title', 'desc');
                break;
            case 'Sort By:Price (Low > High)':
                $query->orderBy('priceInUSD', 'asc');
                break;
            case 'Sort By:Price (High > Low)':
                $query->orderBy('priceInUSD', 'desc');
                break;

            default:
                // Default sorting can be applied here if needed
                break;
        }

        return $query->paginate($this->BookPagination['NoOfBooksTOShowInOnePage']);
    }

    //emitter
    public function OpenProductModal(int $BookId)
    {
        if (is_int($BookId)) {
            $this->dispatch('OpenProductModal', $BookId);
        }
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
