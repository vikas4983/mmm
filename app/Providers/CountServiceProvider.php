<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\AdminMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Cache;

class CountServiceProvider extends ServiceProvider
{
    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    { {
            View::composer(['layouts.auth','admin.dashboard'], function ($view) {
                $adminMenus = Cache::remember('admin_menus', 60, function () {
                    return    AdminMenu::with('childrenRecursive')->whereNull('parent_id')->where('status', 1)->get();
                });
              $view->with('adminMenus', $adminMenus);
            });
        }
    }
}
