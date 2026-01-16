<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileFor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function getProfileForAttribute($value)
    {
        return $value == 1 ? 'Self' : ($value == 2 ? 'Son' : ($value == 3 ? 'Daughter' : ($value == 4 ? 'Sister' : ($value == 5 ? 'Brother' : ($value == 6 ? 'Relative/Friend' : 'NA')))));
    }
}
