<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChangeMobileVerification extends Component
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.change-mobile-verification');
    }
}
