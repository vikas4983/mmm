<?php

namespace App\View\Components\modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessageModalComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $searchResults;
    
    public function __construct($searchResults)
    {
        $this->searchResults = $searchResults;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.message-modal-component');
    }
}
