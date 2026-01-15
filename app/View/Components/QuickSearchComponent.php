<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuickSearchComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $age;
    public $options;
    public $quickFilter;
    
    public function __construct($age = null, $options = [], $quickFilter=[])
    {
        $this->age = $age ; 
        $this->options = $options; 
        $this->quickFilter = $quickFilter; 
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.quick-search-component');
    }
}
