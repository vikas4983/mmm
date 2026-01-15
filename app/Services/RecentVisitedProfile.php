<?php

namespace App\Services;

use App\Models\User;
use App\Models\ViewProfile;
use App\Traits\UserBlockTrait;
use Carbon\Carbon;

class RecentVisitedProfile
{
    use UserBlockTrait;
    public function getVisitedProfile()
    {
        $loginUser = Auth()->user();
        $blockIds = $this->userBlock($loginUser);
        return  ViewProfile::visitedUser($loginUser->id)->whereNotIn('id', $blockIds)->latest()->take(4)->get();;
    }
}
