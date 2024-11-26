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
        View::composer(['layouts.main-master', 'frontend.settings.changePassword', 'dashboard', 'frontend.users.myProfile', 'frontend.search.quick','users','frontend.users.mobile-verification' ], function ($view) {
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
