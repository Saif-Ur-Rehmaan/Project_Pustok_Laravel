<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchFilterLiveWireComponent extends Component
{
    use WithPagination;

    public $Query;
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
        $Books=$this->FetchBooks();
        $this->BookPagination['Showing'] = ($Books->currentPage() - 1) * $Books->perPage() + 1;
        $this->BookPagination['To'] = min($Books->currentPage() * $Books->perPage(), $Books->total());
        $this->BookPagination['Of'] = $Books->total();
        $this->BookPagination['Pages'] = $Books->lastPage();
        $this->BookPagination['NoOfBooksTOShowInOnePage'] = $Books->perPage();
        
        return view('livewire.search-filter-live-wire-component',compact('Books'));
    }
  
    // Functions
    function FetchBooks() {

        
     
        $query=  DB::table('books')
            // joins
            ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.subcategory_id')
            ->join('book_categories', 'book_categories.id', '=', 'book_sub_categories.category_id')
            ->join('users', 'users.id', '=', 'books.author_id')

            // conditions books
            ->where('books.title', 'like', "%$this->Query%")
            ->orWhereJsonContains('books.tags', "$this->Query")
            ->orWhere('books.brand', 'like', "%$this->Query%")
            ->orWhere('books.manufacturer', 'like', "%$this->Query%")
            ->orWhere('books.color', 'like', "%$this->Query%")
            ->orWhere('books.priceInUSD', '<', "$this->Query")
            ->orWhere('books.availability', 'like', "%$this->Query%")
            // conditions match author name
            ->orWhere('users.displayName', 'like', "%$this->Query%")
            // conditions match category name
            ->orWhere('book_categories.name', 'like', "%$this->Query%")
            // conditions match sub category name
            ->orWhere('book_sub_categories.name', 'like', "%$this->Query%")
         
            ;
    

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
        return $query   
                ->select(['books.*','users.displayName as author','book_sub_categories.name as subcatgeoryName'])
                // getting books
                ->paginate($this->BookPagination['NoOfBooksTOShowInOnePage']);
    
    }
    //hooks
    function mount($query=" ") {
        $this->Query=$query; 
    }
}
