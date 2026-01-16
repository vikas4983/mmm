<?php

namespace App\Services\filterCriterias;

use App\Models\QuickSearch;
use Illuminate\Support\Facades\Auth;

class QuickFilterCriteria
{
    public function quickFilter()
    {
        return QuickSearch::where('user_id', Auth::user()->id)->first();
    }
}
