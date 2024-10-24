<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'father_occupation',    'mother_occupation',    'brother',    'brother_married',    'sister',    'sister_married',    'family_living',    'contact_address',    'about_family', 'approved_about_family',   'father_gotra	mother_gotra',    'family_type',    'family_value',    'family_status',    'native_place',    'status',];


    function getApprovedAboutFamilyAttribute($value)
    {
        return $value == 1 ? 'Approved' : 'Disapproved';
    }
}
