<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCardComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $searchResults;
    public function __construct($searchResults)
    {
        $this->searchResults=$searchResults;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-card-component');
    }
}
