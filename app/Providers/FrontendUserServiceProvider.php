<?php

namespace App\Providers;

use App\Models\Payment;
use App\Models\ProfileId;
use App\Models\User;
use App\Models\Plan;
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
        View::composer(['layouts.main-master', 'frontend.settings.changePassword', 'dashboard', 'frontend.users.myProfile', 'frontend.search.quick', 'users', 'frontend.users.mobile-verification', 'frontend.users.photo', 'frontend.users.show', 'frontend.users.profiles.profile', 'frontend.users.interests.interest', 'frontend.users.plans.plan', 'frontend.search.searchResult', 'components.contact-view', 'components.search-result-component', 'components.profile-card-component', 'components.modals.message-modal-component', 'userAction.accessControll', 'frontend.users.messages.message', 'frontend.users.plans.activePlan',], function ($view) {
            $user = Auth::user();
            $prefix = ProfileId::where('status', 1)->latest()->first();
            $plans = Plan::where('status', 1)->get();
            $activePlan = Payment::where('user_id', $user->id)->where('is_paid', 1)->latest('created_at')->first();
            $view->with([
                'user' => $user,
                'prefix' => $prefix,
                'plans' => $plans,
                'activePlan' => $activePlan,
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
