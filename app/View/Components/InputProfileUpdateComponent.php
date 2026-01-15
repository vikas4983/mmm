<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputProfileUpdateComponent extends Component
{
    public $type;
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public $user;
    public function __construct($type = 'text', $user, $name, $label, $placeholder =  '', $value = '')
    {

        $this->type = $this->determineInputType($name, $type);
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder ?: 'Enter ' . $label;
        $this->value = $value;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-profile-update-component');
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
            'date_of_birth' => 'date',
        ];

        return $types[$name] ?? $defaultType;
    }
}
