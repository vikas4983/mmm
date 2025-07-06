<?php

namespace App\Providers;

use App\View\Components\FormFieldsComponent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use App\Services\OptionService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // You can bind the OptionService if needed here.
        $this->app->singleton(OptionService::class, fn () => new OptionService());
    }

    public function boot(): void
    {
        // Use Bootstrap pagination
        Paginator::useBootstrap();

        // Register custom blade component
        Blade::component('form-fields', FormFieldsComponent::class);

        // Call the load method from your OptionService
       // app(OptionService::class)->load();
    }
}
