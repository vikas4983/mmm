<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickSearch extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'min_age', 'max_age', 'religion', 'caste'];


    


    public function getReligionAttribute($value)
    {
        return explode(',', $value);
    }

    public function getCasteAttribute($value)
    {
        if (is_string($value)) {
            return explode(',', $value);
        }
        return $value;
    }

    public function getCasteAsString()
    {
        return implode(',', $this->caste);
    }
}
