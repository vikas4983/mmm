<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactViewByMe extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'view_profile'];
}
