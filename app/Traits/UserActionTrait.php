<?php

namespace App\Traits;

use App\Models\Invitation;
use Illuminate\Support\Facades\Log;

trait UserActionTrait
{
    public function getUserData($validatedData)
    {
        try {
            if ($validatedData) {
                $sentByMe = Invitation::where('user_id', $validatedData['user_id'])
                    ->where('receiver_id', $validatedData['receiver_id'])
                    ->first();
                if ($sentByMe) {
                   
                    return $sentByMe;
                }
            }
            return Invitation::where('user_id', $validatedData['receiver_id'])
                ->where('receiver_id', $validatedData['user_id'])
                ->first();
        } catch (\Exception $e) {
            Log::error('Error fetching invitation data: ' . $e->getMessage());
            return null;
        }
    }
}
