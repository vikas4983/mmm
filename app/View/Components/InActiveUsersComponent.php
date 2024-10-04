<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InActiveUsersComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $inActiveUsers;
    public function __construct($inActiveUsers)
    {
        $this->inActiveUsers = $inActiveUsers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.in-active-users-component');
    }
}
