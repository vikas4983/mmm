<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyMatchService
{

    public function myMatch()
    {
        $user = Auth::user();
        $userGender = $user->gender;
    }
}
