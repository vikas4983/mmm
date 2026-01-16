<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'father_occupation',    'mother_occupation',    'brother',    'brother_married',    'sister',    'sister_married',    'family_state','family_city',    'contact_address',    'about_family', 'approved_about_family',   'father_gotra',	'mother_gotra',    'family_type',    'family_value',    'family_status',    'native_place',    'status',];


    function getApprovedAboutFamilyAttribute($value)
    {
        return $value == 1 ? 'Approved' : 'Disapproved';
    }



    public function fatherOccupations()
    {
        return $this->belongsTo(FatherOccupation::class,'father_occupation', 'id');
    }
    public function motherOccupations()
    {
        return $this->belongsTo(MotherOccupation::class,'mother_occupation', 'id');
    }
    public function familyTypes()
    {
        return $this->belongsTo(FamilyType::class,'family_type', 'id');
    }
    public function familyValues()
    {
        return $this->belongsTo(FamilyValue::class,'family_value', 'id');
    }
    public function familyStatus()
    {
        return $this->belongsTo(FamilyStatus::class,'family_status', 'id');
    }
    public function familyState()
    {
        return $this->belongsTo(State::class,'family_state', 'id');
    }
    public function familyCity()
    {
        return $this->belongsTo(City::class,'family_city', 'id');
    }
}
