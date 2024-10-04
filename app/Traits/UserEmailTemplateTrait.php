<?php

namespace App\Traits;
use App\Models\EmailTemplate;
use App\Models\UserOTP;
use Carbon\Carbon;

trait UserEmailTemplateTrait
{
    public function userEmailTemplate($name)
    {
        $userEmailTemplate = EmailTemplate::where('status', 1)->where('action', 0)->where('name', $name)->first();
       return $userEmailTemplate;

    }
}