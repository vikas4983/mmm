<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoroscopeDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'time_of_birth','manglik', 'place_of_birth', 'rashi', 'horoscope_match', 'horoscope_show', 'status'];
}
