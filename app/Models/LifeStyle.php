<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeStyle extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',    'body_type', 'complextion', 'dietary_habit',    'drinking_habit',    'smoking_habit',    'physical_status',    'weight',    'blood_group', 'open_to_pet', 'own_house', 'own_car',    'language_speak',    'hiv',    'thalassemia', 'status'];

    function getDietaryHabitAttribute($value)
    {
        return $value == 1 ? 'Vegetarian' : ($value == 2 ? 'Non-Vegetarian' : ($value == 3 ? 'Jain' : ($value == 4 ? 'Eggetarian' : null)));
    }

    function getDrinkingHabitAttribute($value)
    {
        return $value == 1 ? 'Yes' : ($value == 2 ? 'No' : ($value == 3 ? 'Occasionally' : null));
    }

    function getSmokingHabitAttribute($value)
    {
        return $value == 1 ? 'Yes' : ($value == 2 ? 'No' : ($value == 3 ? 'Occasionally' : null));
    }
    public function setWeightAttribute($value)
    {
      
        $this->attributes['weight'] = $value . ' kg';
    }

    public function bodyTypes()
    {
        return $this->belongsTo(BodyType::class,'body_type', 'id');
    }
    public function complextions()
    {
        return $this->belongsTo(Complextion::class,'complextion', 'id');
    }
    public function dietaryHabits()
    {
        return $this->belongsTo(DietaryHabit::class,'dietary_habit', 'id');
    }
    public function drinkingHabits()
    {
        return $this->belongsTo(DietaryHabit::class,'drinking_habit', 'id');
    }
    public function smokingHabits()
    {
        return $this->belongsTo(SmokeHabit::class,'smoking_habit', 'id');
    }
    public function physicalStatus()
    {
        return $this->belongsTo(Challenge::class,'physical_status', 'id');
    }
    public function bloodGroups()
    {
        return $this->belongsTo(BloodGroup::class,'blood_group', 'id');
    }
    public function speaklanguages()
    {
        return $this->belongsTo(LanguageSpeak::class,'language_speak', 'id');
    }
}
