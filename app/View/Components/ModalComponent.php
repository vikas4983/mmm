<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $action;
    public $method;
    public $formFields;
    public function __construct($id, $title, $action, $method = 'POST', $formFields = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
        $this->formFields = $formFields;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-component');
    }
}
