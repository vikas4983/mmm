<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditFormFieldComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $fields;
    public $user;
    public $actionUrl;
    public $id;

    public function __construct( $fields, $user, $actionUrl, $id)
    {
       
        $this->fields = $fields;
        $this->user = $user;
        $this->actionUrl = $actionUrl;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-form-field-component');
    }
}
