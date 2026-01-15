<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateAccountDetailsComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public $prefix;
    public function __construct($user,$prefix)
    {
        $this->user = $user;
        $this->prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.update-account-details-component');
    }
}
