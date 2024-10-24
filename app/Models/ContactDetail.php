<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',	'alternate_mobile',	'alternate_owned_by',	'landline_number',	'landline_owned_by',	'status',];
}
