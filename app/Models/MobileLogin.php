<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileLogin extends Model
{
    use HasFactory;
    public $fillable = ['admin_id', 'otp', 'mobile', 'expires_at'];


    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
//abcs