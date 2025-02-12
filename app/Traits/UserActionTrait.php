<?php
namespace App\Traits;

use App\Models\Invitation;

trait UserActionTrait
{
    public function getUserData($validatedData){
        return   Invitation::where('user_id', $validatedData['user_id'])->where('receiver_id', $validatedData['receiver_id'])->first();
   }
}