<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSearch extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'min_age', 'max_age', 'min_height', 'max_height', 'marital_status','children', 'religion', 'caste','country','state','city','profile_show'];

//  protected $explodeColumns = ['MaritalStatus']; 

//     public function getAttribute($key)
//     {
//         $value = parent::getAttribute($key);

//         if (in_array($key, $this->explodeColumns) && is_string($value)) {
//             return explode(',', $value);
//         }

//         return $value;
//     }


    public function getMaritalStatusAttribute($value)
    {
        return explode(',', $value);
    }
    public function getReligionAttribute($value)
    {
        return explode(',', $value);
    }
    public function getStateAttribute($value)
    {
        return explode(',', $value);
    }
    public function getCountryAttribute($value)
    {
        return explode(',', $value);
    }
    public function getCasteAttribute($value)
    {
        return explode(',', $value);
    }
    public function getCityAttribute($value)
    {
        return explode(',', $value);
    }
    public function getProfileShowAttribute($value)
    {
        return explode(',', $value);
    }
}
