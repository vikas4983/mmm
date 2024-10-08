<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function getCaste(Request $request, $religionId){
       
        $castes = Caste::where('religion_id', $religionId)->get();
        return response()->json($castes);
    }
}
