<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public function __construct($type = 'text', $name, $label, $placeholder =  '', $value = '')
    {

        $this->type = $this->determineInputType($name, $type);
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder ?: 'Enter ' . $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-component');
    }

    private function determineInputType($name, $defaultType)
    {
        $types = [
            'password' => 'password',
            'password_confirmation' => 'password',
            'email' => 'email',
            'mobile' => 'number',
            'alternate_mobile' => 'number',
            'landline_number' => 'number',
            'time_of_birth' => 'time',
            'weight' => 'number',
            'dob' => 'date',
        ];

        return $types[$name] ?? $defaultType;
    }
}
