<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait SearchGender
{
    public function getGender($user)
    {
        if (!$user) {
            return redirect()->back()->with('error', 'Please Login!');
        }
        $searchGender = $user->gender == 'male' ? 'female' : 'male';

        return   $searchGender;
    }
}
