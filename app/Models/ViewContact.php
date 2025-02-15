<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewContact extends Model
{
    use HasFactory;
    protected $fillable = ['view_id', 'viewed_id'];

    public function view(){
        return $this->belongsTo(User::class, 'viewed_id');
    }
    public function viewed(){
        return $this->belongsTo(User::class, 'view_id');
    }
}
