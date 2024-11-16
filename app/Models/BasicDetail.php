<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetail extends Model
{
    use HasFactory;
    
   
    protected $fillable = ['user_id', 'dob','height','mother_tongue', 'religion', 'caste', 'marital_status','children', 'status'];
   
    public function test()
    {
        return $this->belongsTo(User::class);  // The related model (TestModel) should be passed here
    }
}
