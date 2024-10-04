<?php

namespace App\Providers;

use App\Models\ProfileId;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FrontendUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // View::composer(['layouts.main-master','dashboard','frontend.users.myProfile'], function ($view) {
        //     $user = Cache::remember('active_logo', 60 * 60, function () {
        //         return Auth::user()->where('status', 1)->latest()->first();
        //     });
        //     $prefix = Cache::remember('active_logo', 60 * 60, function () {
        //         return ProfileId::where('status', 1)->latest()->first();
        //     });
        //     $view->with([
        //         'user' => $user,
        //         '$prefix' => $prefix,
        //     ]);
        // });
        View::composer(['layouts.main-master', 'frontend.settings.changePassword', 'dashboard', 'frontend.users.myProfile', 'frontend.search.quick'], function ($view) {
            $user = Auth::user();
            $prefix = ProfileId::where('status', 1)->latest()->first();

            $view->with([
                'user' => $user,
                'prefix' => $prefix, // Removed the extra $ sign
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
