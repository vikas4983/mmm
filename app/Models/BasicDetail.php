<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BasicDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'dob', 'height', 'mother_tongue', 'religion', 'caste', 'marital_status', 'children', 'other_caste_marriage', 'status'];

    public function test()
    {
        return $this->belongsTo(User::class); // The related model (TestModel) should be passed here
    }

    public function heights()
    {
        return $this->belongsTo(Height::class, 'height', 'id'); // The related model (TestModel) should be passed here
    }
    public function motherTongues()
    {
        return $this->belongsTo(MotherTongue::class, 'mother_tongue', 'id'); // The related model (TestModel) should be passed here
    }
    public function religions()
    {
        return $this->belongsTo(Religion::class, 'religion', 'id'); // The related model (TestModel) should be passed here
    }
    public function castes()
    {
        return $this->belongsTo(Caste::class, 'caste', 'id'); // The related model (TestModel) should be passed here
    }
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status', 'id'); // The related model (TestModel) should be passed here
    }

    function getChildrenAttribute($value)
    {
        return $value == 1 ? 'No' : ($value == 2 ? 'Yes, Living together' : ($value == 3 ? 'Yes, Not Living together' : ''));
    }
    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d M Y') : null;
    }

    public function getOtherCasteMarriageAttribute($value)
    {
        return $value == 0 ? 'No' : 'Yes';
    }

    public function getAgeAttribute()
    {
        if ($this->dob) {
            $dob = Carbon::parse($this->dob);
            $now = Carbon::now();
            $years = $dob->diffInYears($now);
            $months = $dob->diffInMonths($now) % 12;
            return (intval($years) ? intval($years) . 'Y' : '') . (intval($years) && intval($months) ? ', ' : '') . (intval($months) ? intval($months) . 'M' : '');
        }

        return '0Y, 0M';
    }
}
