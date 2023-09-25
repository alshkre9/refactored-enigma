<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $role
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
