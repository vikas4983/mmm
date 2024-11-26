<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    use HasFactory;
    public $fillable = ['religion_id', 'caste', 'status'];
    
    public function religions()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Active' : 'Inactive';
    }
}
