<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $options;
    public $selected;
    
    public function __construct( $name,$label,$options,$selected) 
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
        
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-component');
    }
}
