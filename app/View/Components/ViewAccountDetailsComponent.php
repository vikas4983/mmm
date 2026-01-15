<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewAccountDetailsComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public $fields;
    public $prefix;
    public function __construct($user, $fields ,$prefix)
    {
        $this->user = $user;
        $this->fields = $fields;
        $this-> prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.view-account-details-component');
    }
}
