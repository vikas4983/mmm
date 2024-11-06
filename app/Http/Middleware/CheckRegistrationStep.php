<?php

namespace App\Http\Middleware;

use App\Models\BasicDetails;
use App\Models\CarrierDetail;
use App\Models\ContactDetail;
use App\Models\FamilyDetail;
use App\Models\HoroscopeDetail;
use App\Models\Image;
use App\Models\LifeStyle;
use App\Models\LikeDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRegistrationStep
{
    public function handle($request, Closure $next)
    {
        if (session()->has('login') == 'yes') {
            //dd('abc');
            return redirect()->route('dashboard');
        }
        if (session()->has('registration_step') === '2') {

            return redirect()->route('verification');
        }
        $routes = [
            'members.create' => 1,
            'verification' => 2,
            'otp.varify' => 2,
            'otp.again' => 2,
            'basicDetails.create' => 4,
            'basicDetails.store' => 4,
            'horoscopes.create' => 5,
            'horoscopes.store' => 5,
            'carrierDetails.create' => 6,
            'carrierDetails.store' => 6,
            'familyDetails.create' => 7,
            'familyDetails.store' => 7,
            'lifestyleDetails.create' => 8,
            'lifestyleDetails.store' => 8,
            'likeDetails.create' => 9,
            'likeDetails.store' => 9,
            'contactDetails.create' => 10,
            'contactDetails.store' => 10,
            'images.create' => 11,
            'images.store' => 11,
            'dashboard' => 'done',
        ];
       
        if (!session()->has('registration_step')) {
            session(['registration_step' => 1]);
            return redirect()->route('members.create');
        }
        $currentStep = (int) session('registration_step');
        $currentRouteName = $request->route()->getName();
        $requiredStep = $routes[$currentRouteName] ?? 1;
        //dump($currentStep, $requiredStep);
        if ($currentStep !== $requiredStep) {
            return redirect()->route(array_search($currentStep, $routes));
        }
        
        return $next($request);
    }
}
