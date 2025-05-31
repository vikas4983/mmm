<?php

namespace App\Services\filterCriterias;

use App\Models\AdvanceSearch;
use Illuminate\Support\Facades\Auth;

class AdvanceFilterCriteria
{
    public function advanceFilter()
    {
        return AdvanceSearch::where('user_id', Auth::user()->id)->first() ;
    }
}
