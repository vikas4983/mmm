<?php

namespace App\Services\filterCriterias;

use App\Models\BasicSearch;
use Illuminate\Support\Facades\Auth;

class BasicFilterCriteria
{
    public function basicFilter()
    {
        return BasicSearch::where('user_id', Auth::user()->id)->first();
    }
}
