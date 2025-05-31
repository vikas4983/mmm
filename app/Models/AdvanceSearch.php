<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'min_age',
        'max_age',
        'min_height',
        'max_height',
        'religion',
        'caste',
        'marital_status',
        'children',
        'mother_tongue',
        'country',
        'state',
        'city',
        'income',
        'education',
        'occupation',
        'photo',
        'horoscope',
        'manglik',
        'family_status',
        'physical_status',
        'diet',
        'drink',
        'smoke',
        'hiv'
    ];
}
