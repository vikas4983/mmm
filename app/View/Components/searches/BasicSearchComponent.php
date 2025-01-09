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
    public $age;
    public $options;
    public function __construct($age = '',$options = '' )
    {
        $this->age = $age;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.searches.basic-search-component');
    }
}
