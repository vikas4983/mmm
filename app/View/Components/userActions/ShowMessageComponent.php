<?php

namespace App\View\Components\userActions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowMessageComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-actions.show-message-component');
    }
}
