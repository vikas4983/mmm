<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewContact extends Component
{
    /**
     * Create a new component instance.
     */
    public $contactDetails;
    public $user;
    //public $leftMobileNumber;
    
    public function __construct($contactDetails, $user)
    {
        $this->contactDetails=$contactDetails;
        $this->user = $user;
       // $this->leftMobileNumber = $leftMobileNumber;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.view-contact');
    }
}
