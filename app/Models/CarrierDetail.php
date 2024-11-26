<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'country', 'state','city', 'education','education_detail', 'employee','occupation','occupation_detail','income', 'about_me','approved_about_me','status'];
    function getApprovedAboutMeAttribute($value)
    {
        return $value == 1 ? 'Approved' : 'Disapproved';
    }
    public function countries()
    {
       return $this->belongsTo(Country::class, 'country', 'id');
    }
    public function states()
    {
       return $this->belongsTo(State::class, 'state', 'id');
    }
}
