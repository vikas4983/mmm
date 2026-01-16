<?php

namespace App\View\Components\settings;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageSettingComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $settingData;
    public function __construct($settingData)
    {
        $this->settingData=$settingData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.settings.image-setting-component');
    }
}
