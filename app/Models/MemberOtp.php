<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOtp extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'otp', 'status', 'expires_at'];


    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Active' : 'Inactive';
    }
}
