<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'dp_image', 'display_picture',    'image1',    'image2',    'image3',    'image4',    'status',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPathAttribute()
    {
        $path = asset('storage/user/images/');
        $dpImage = Image::with('user')->where('dp_image', 1)->first();
        $path =  $path . '/' . $dpImage->name;
       return  $path;
    }
}
