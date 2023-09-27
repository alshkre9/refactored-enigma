<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $role,
        public Product $product
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.form');
    }
}
