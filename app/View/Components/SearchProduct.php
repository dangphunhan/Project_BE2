<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Protype;
use Illuminate\View\Component;

class SearchProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $allProducts = Product::all();
        $allProtype = Protype::all();
        return view('components.search-product')->with('allProducts', $allProducts)
                                                ->with('allProtype', $allProtype);

    
    }
}
