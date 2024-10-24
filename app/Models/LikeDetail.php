<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',    'hobby',    'interest', 'music',    'dress', 'movie', 'sport',    'status'];
}
