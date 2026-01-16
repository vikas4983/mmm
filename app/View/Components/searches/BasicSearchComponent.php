<?php

namespace App\View\Components\searches;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicSearchComponent extends Component
{
    /**
     * Create a new component instance.
     */
    
    public $options;
    public $basicFilter;
    public function __construct($options = '', $basicFilter )
    {
        
        $this->options = $options;
        $this->basicFilter = $basicFilter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.searches.basic-search-component');
    }
}
