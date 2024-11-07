<?php

namespace App\Traits;


use Carbon\Carbon;
use App\Models\BasicDetail;
use App\Models\CarrierDetail;
use App\Models\ContactDetail;
use App\Models\FamilyDetail;
use App\Models\HoroscopeDetail;
use App\Models\Image;
use App\Models\LifeStyle;
use App\Models\LikeDetail;
use Illuminate\Support\Facades\Auth;

trait RegistrationStepsTrait
{
    public function registrationStep($userId)
    {
        $basicDetails = BasicDetail::where('user_id', $userId)->first();
        $horoscopeDetails = HoroscopeDetail::where('user_id', $userId)->first();
        $carrierDetails = CarrierDetail::where('user_id', $userId)->first();
        $familyDetails = FamilyDetail::where('user_id', $userId)->first();
        $lifestyleDetails = LifeStyle::where('user_id', $userId)->first();
        $likeDetails = LikeDetail::where('user_id', $userId)->first();
        $contactDetails = ContactDetail::where('user_id', $userId)->first();
        $images = Image::where('user_id', $userId)->first();

        if ($basicDetails === null || $basicDetails->status === 0) {
            session(['registration_step' => 4]);
            return redirect()->route('basicDetails.create');
        }

        if ($horoscopeDetails === null || $horoscopeDetails->status === 0) {
            session(['registration_step' => 5]);
            return redirect()->route('horoscopes.create');
        }

        if ($carrierDetails === null || $carrierDetails->status === 0) {

            session(['registration_step' => 6]);
            return redirect()->route('carrierDetails.create');
        }
        if ($familyDetails === null || $familyDetails->status === 0) {
            session(['registration_step' => 7]);
            return redirect()->route('familyDetails.create');
        }
        if ($lifestyleDetails === null || $lifestyleDetails->status === 0) {
            session(['registration_step' => 8]);
            return redirect()->route('lifestyleDetails.create');
        }
        if ($likeDetails === null || $likeDetails->status === 0) {
            session(['registration_step' => 9]);
            return redirect()->route('likeDetails.create');
        }
        if ($contactDetails === null || $contactDetails->status === 0) {
            session(['registration_step' => 10]);
            return redirect()->route('contactDetails.create');
        }
        if ($images === null || $images->status === 0) {
            session(['registration_step' => 11]);
            return redirect()->route('images.create');
        }
        return null;
    }
}