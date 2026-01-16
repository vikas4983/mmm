<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationStep extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'user_status', 'verification_status', 'basic_detail_status','horoscope_detail_status', 'carrier_detail_status', 'family_detail_status', 'lifestyle_detail_status','like_detail_status', 'contact_detail_status', 'image_status', 'status'];
}
