<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectComponent extends Component
{
    /**
     * Create a new component instance.
     */public $name;
    public $label;
    public $options;
    public $placeholder;
    public $value;
    public function __construct($name, $label, $options = [], $placeholder = '', $value = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-component');
    }
}
