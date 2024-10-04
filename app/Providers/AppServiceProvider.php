<?php

namespace App\Providers;

use App\View\Components\FormFieldsComponent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any application services if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the Blade component
        Blade::component('form-fields', FormFieldsComponent::class);
    }
}
