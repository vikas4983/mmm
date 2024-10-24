<?php

namespace App\Http\Controllers;

use App\Models\FamilyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.registration.familyDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {

            return redirect()->back()->with('error', 'User not authenticated!');
        }
        $fields = config('formFields.familyDetails');
        $validationRules = [];
        foreach ($fields as $field) {

            $validationRules[$field['name']] = $field['rules'];
        }

        if ($request->input('country')) {

            if ($request->input('state')) {

                if ($request->input('city')) {

                    $validationRules['city'] = 'nullable|numeric';
                }
            }
        }
        $brother = isset($request->brother) ? intval($request->brother) : 0;
        $brother_married = isset($request->brother_married) ? intval($request->brother_married) : 0;
        $sister = isset($request->sister) ? intval($request->sister) : 0;
        $sister_married = isset($request->sister_married) ? intval($request->sister_married) : 0;
        if ((int)$brother < (int)$brother_married) {
            return redirect()->back()->with('error', "Select valid options for brother's marital status!");
        }
        if ((int)$sister < (int)$sister_married) {
            return redirect()->back()->with('error', "Select valid options for sister's marital status!");
        }
        $validatedData = $request->validate($validationRules);
        $validatedData['user_id'] = $user->id;
        $validatedData['family_living'] = $request->input('city');
        $existingRecord = FamilyDetail::where('user_id', $user->id)->first();
        try {

            if ($existingRecord) {
                $existingRecord->update($validatedData);
                return redirect()->route('lifestyleDetails.create')->with('success', 'Family details saved successfully!');
            } else {

                FamilyDetail::create($validatedData); // Add user_id to the created record
                return redirect()->route('lifestyleDetails.create')->with('success', 'Family details saved successfully!');
            }
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamilyDetail $familyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyDetail $familyDetail)
    {
        //
    }
}
