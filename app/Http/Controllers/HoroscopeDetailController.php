<?php

namespace App\Http\Controllers;

use App\Models\HoroscopeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoroscopeDetailController extends Controller
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
        return view('frontend.registration.horoscopes.create');
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
    
        $request['user_id'] = $user->id;
        $fields = config('formFields.horoscopeDetails');
        $validationRules = [];
        foreach ($fields as $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        if ($request->input('state')) {
            $validationRules['city'] = 'nullable|string';
        }
        $validatedData = $request->validate($validationRules);
    
        try {
            $existingRecord = HoroscopeDetail::where('user_id', $user->id)->first();
            $dataToSave = array_merge($validatedData, [
                'place_of_birth' => $request->input('city', ''),
                'status' => 1,
            ]);
    
            if ($existingRecord) {
                $existingRecord->update($dataToSave);
                session(['registration_step' => '6']);
            } else {
                $dataToSave['user_id'] = $user->id;
                HoroscopeDetail::create($dataToSave);
                session(['registration_step' => '6']);
            }
    return redirect()->route('carrierDetails.create')->with('success', 'Horoscope details saved successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(HoroscopeDetail $horoscopeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoroscopeDetail $horoscopeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoroscopeDetail $horoscopeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoroscopeDetail $horoscopeDetail)
    {
        //
    }
}
