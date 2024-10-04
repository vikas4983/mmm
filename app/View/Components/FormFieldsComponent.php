<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormFieldsComponent extends Component
{
    public  $fields;

    public function __construct( $fields )
    {
        $this->fields = $fields;
    }

    public function render(): View|Closure|string
    {
        

        return view('components.form-fields-component');
    }
}
