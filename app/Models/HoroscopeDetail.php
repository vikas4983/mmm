<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class HoroscopeDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'time_of_birth', 'manglik', 'place_of_birth', 'rashi', 'horoscope_match', 'horoscope_show', 'status'];

    public function rashies()
    {
        return $this->belongsTo(Rashi::class, 'rashi', 'id');  // The related model (TestModel) should be passed here
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'place_of_birth', 'id');  // The related model (TestModel) should be passed here
    }
    public function getTimeOfBirthAttribute($value)
    {
        return Carbon::createFromFormat('H:i', $value)->format('h:i A');
    }
    public function getHoroscopeMatchAttribute($value)
    {
        return $value == 1 ? 'yes' : 'no';
    }
    public function getHoroscopeShowAttribute($value)
    {
        return $value == 1 ? 'yes'
            : ($value == 0 ? 'no'
                : ($value == 2 ? 'only accept member'
                    : 'Unknown'));
    }
}
