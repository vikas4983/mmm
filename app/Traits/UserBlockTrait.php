<?php

namespace App\Traits;

use App\Models\Invitation;

trait UserBlockTrait
{
    public function userBlock($user)
    {   
        
        $blockByLoginUser = $user->blockedUser->pluck('blocked_id')->toArray();
        $blockByOther = $user->blockedByUsers->pluck('blocker_id')->toArray();
       return $blockIds = array_merge($blockByLoginUser, $blockByOther);
        
       
    }
}
