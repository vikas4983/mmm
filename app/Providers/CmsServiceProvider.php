<?php

namespace App\Providers;

use App\Models\cmsPage;
use App\Services\CmsService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CmsService::class, function ($app) {
            return new CmsService($app->make(CmsPage::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $cmsPages = app(CmsService::class);
       $view->with('cmsPages', $cmsPages->getCmsPages());
        
        });
    }
}
