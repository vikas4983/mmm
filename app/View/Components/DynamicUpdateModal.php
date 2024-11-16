<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DynamicUpdateModal extends Component
{
    public $data;
    public $fields;
    public $actionUrl;

    public function __construct($data = [], $fields = [], $actionUrl = '#')
    {
        $this->data = $data;
        $this->fields = $fields;
        $this->actionUrl = $actionUrl;
    }

    public function render()
    {
        return view('components.dynamic-update-modal');
    }

    private function type($type){

    }
}
