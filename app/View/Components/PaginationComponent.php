<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginationComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $pagination;
      
    public function __construct($pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination-component');
    }
}
