<?php

namespace App\Http\Controllers;

use App\Models\cmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsPageViewController extends Controller
{
    public function show($slug)
    {

        $cmsPage = cmsPage::where('slug', $slug)->firstOrFail();

        if (!$cmsPage) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
        if (Auth::check()) {
            return view($slug, compact('cmsPage'));
        }
        return view($slug, compact('cmsPage'));
    }
}
