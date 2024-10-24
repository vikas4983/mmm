<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',	'display_picture',	'image1',	'image2',	'image3',	'image4',	'status',];
}
