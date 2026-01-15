<?php

namespace App\Traits;

use App\Models\BasicDetail;
use App\Models\CarrierDetail;
use App\Models\ContactDetail;
use App\Models\FamilyDetail;
use App\Models\FamilyValue;
use App\Models\HoroscopeDetail;
use App\Models\Image;
use App\Models\LifeStyle;
use App\Models\LikeDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait UserStatusTrait
{
    public function userStatus()
    {
        $models = [
            BasicDetail::class,
            HoroscopeDetail::class,
            CarrierDetail::class,
            FamilyDetail::class,
            LifeStyle::class,
            LikeDetail::class,
            ContactDetail::class,
            Image::class,
        ];
        $loginUserId = Auth::user()->id;
        $userStatusZero = [];

        foreach ($models as $model) {
            $statusZeroUserIds = $model::where('user_id', '!=', $loginUserId)
                ->where('status', 0)
                ->pluck('user_id')
                ->toArray();
            $userStatusZero = array_merge($userStatusZero, $statusZeroUserIds);
        }
        $userStatusZero = array_unique($userStatusZero);
        return $userStatusZero;
    }
}
