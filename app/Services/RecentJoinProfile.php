<?php

namespace App\Services;

use App\Models\User;
use App\Traits\UserBlockTrait;
use Carbon\Carbon;

class RecentJoinProfile
{
    use UserBlockTrait;
    public function getProfile($path)
    {
        $loginUser = auth()->user();
        $blockIds = $this->userBlock($loginUser);
        $query = User::excludeUser($loginUser)
            ->whereNotIn('id', $blockIds)
            ->oppositeGender($loginUser->gender)
            ->createdWithinLastDays(30);
        if ($path === 'recent-join') {
            return $query->orderBy('created_at', 'desc')->paginate(1);
        } else {
            return $query->latest()->take(4)->paginate(1);
        }
    }
}
