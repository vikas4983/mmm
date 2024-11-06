<?php

namespace App\Http\Controllers;

use App\Models\LifeStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LifeStyleController extends Controller
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
        return view('frontend.registration.lifestyleDetails.create');
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
        $fields = config('formFields.lifestyleDetails');
        $validationRules = [];
        foreach ($fields as $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        $validatedData = $request->validate($validationRules);
        $validatedData['user_id'] = $user->id;
        $validatedData['status'] = 1;
        $existingRecord = LifeStyle::where('user_id', $user->id)->first();
        try {
            if ($existingRecord) {
                $existingRecord->update($validatedData);
                session(['registration_step' => '9']);
                return redirect()->back()->with('success', 'Lifestyle details saved successfully!');
            } else {

                LifeStyle::create($validatedData);
                session(['registration_step' => '9']);
                return redirect()->route('likeDetails.create')->with('success', 'Lifestyle details saved successfully!');
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
    public function show(LifeStyle $lifeStyle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LifeStyle $lifeStyle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LifeStyle $lifeStyle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LifeStyle $lifeStyle)
    {
        //
    }
}
