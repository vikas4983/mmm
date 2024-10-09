<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'dob','height','mother_tongue', 'religion', 'caste', 'marital_status', 'status'];
}
