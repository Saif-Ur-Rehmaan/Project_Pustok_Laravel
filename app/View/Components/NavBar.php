<?php

namespace App\View\Components;

use App\Models\BookCategory;
use App\Models\BookSubCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function Psy\debug;

class NavBar extends Component
{
    /**
     * Create a new component instance.
     */
    public $Categories;
    public function __construct()
    {
        $this->Categories = BookCategory::with('subcategories')->has('subcategories')->get();//get categories which have subcategories
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-bar');
    }
}
