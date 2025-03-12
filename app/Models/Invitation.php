<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'sender_id', 'receiver_id', 'is_sent', 'is_friend','is_decline', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
