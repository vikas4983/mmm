<?php

namespace App\Providers;

use App\Models\Favicon;
use App\Models\Logo;
use App\Models\LogoFavicon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class LogoFaviconServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer(['index','admin-login','layouts.auth', 'layouts.frontend.master', 'layouts.frontend.main-master'], function ($view) {
            $logos = Cache::remember('active_logo', 60 * 60, function () {
                return Logo::where('status', 1)->latest()->first();
            });
            $favicons = Cache::remember('active_favicon', 60 * 60, function () {
                return Favicon::where('status', 1)->latest()->first();
            });
            $view->with([
                'logos' => $logos,
                'favicons' => $favicons
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
