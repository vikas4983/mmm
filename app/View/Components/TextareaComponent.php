<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextareaComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $type;
    public $value;
    public $placeholder;
    public function __construct($type = 'text', $name, $label, $placeholder = '', $value = '')
    
    {
        
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder ? : 'Enter'. $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea-component');
    }
}
