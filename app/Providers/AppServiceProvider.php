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
        $this->app->singleton(OptionService::class, fn() => new OptionService());
    }

    public function boot(): void
    {
        Paginator::useBootstrap();
        Blade::component('form-fields', FormFieldsComponent::class);
       // app(OptionService::class)->load();
    }
}
