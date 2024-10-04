<?php

namespace App\Http\Controllers;

use App\Models\AdminApiToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminApiTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Auth using admin guard

        return view('admin.api-tokens.index', ['tokens' => $admin->tokens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $token = $admin->createToken($request->name)->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminApiToken $adminApiToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminApiToken $adminApiToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminApiToken $adminApiToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminApiToken $adminApiToken, $tokenId)
    {
        $admin = Auth::guard('admin')->user();
        $admin->tokens()->where('id', $tokenId)->delete();

        return response()->json(['message' => 'Token deleted successfully.'], 200);
    }
}
