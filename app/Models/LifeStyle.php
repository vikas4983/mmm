<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeStyle extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',    'body_type', 'complexion', 'dietary_habit',    'drinking_habit',    'smoking_habit',    'physical_status',    'weight',    'blood_group', 'open_to_pet', 'own_house', 'own_car',    'language_speak',    'hiv',    'thalassemia', 'status'];

    function getDietaryHabitAttribute($value)
    {
        return $value == 1 ? 'Yes' : ($value == 2 ? 'No' : ($value == 3 ? 'Occasionally' : null));
    }
    function getSmokingHabitAttribute($value)
    {
        return $value == 1 ? 'Yes' : ($value == 2 ? 'No' : ($value == 3 ? 'Occasionally' : null));
    }
    function getDrinkinggHabitAttribute($value)
    {
        return $value == 1 ? 'Yes' : ($value == 2 ? 'No' : ($value == 3 ? 'Occasionally' : null));
    }
}
