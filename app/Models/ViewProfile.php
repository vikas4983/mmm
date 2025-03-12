<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewProfile extends Model
{
    use HasFactory;
    protected $fillable = ['viewer_id', 'viewed_user_id', 'viewed_at'];
}
