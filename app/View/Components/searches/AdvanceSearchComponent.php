<?php

namespace App\View\Components\searches;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdvanceSearchComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $options;
    public $selectedAdvanceFilters;

    public function __construct($options, $selectedAdvanceFilters)
    {
        $this->options = $options;
        $this->selectedAdvanceFilters = $selectedAdvanceFilters;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.searches.advance-search-component');
    }
}
