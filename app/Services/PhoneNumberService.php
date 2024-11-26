<?php

namespace App\Services;

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException; // Import the exception class

class PhoneNumberService
{
    public function formatPhoneNumber($number)
    {
        $number = preg_replace('/\D/', '', $number);

        if (substr($number, 0, 2) !== '91') {
            $number = '91' . $number;
        }

        return  $number;
    }
}