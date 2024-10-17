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
        if (!$request->country && !$request->rashi && !$request->time_of_birth) {
            $existingRecord = HoroscopeDetail::where('user_id', $user->id)->first();

            if ($existingRecord) {
                $existingRecord->update($request->all());
                return redirect()->route('carrierDetails.create')->with('success', 'Horoscope details saved successfully!');
            } else {
                HoroscopeDetail::create($request->all());
                return redirect()->route('carrierDetails.create')->with('success', 'Horoscope details saved successfully!');
            }
        }
        $fields = config('formFields.horoscopeDetails');
        $validationRules = [];
        foreach ($fields as $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        if ($request->input('country') || $request->input('rashi') || $request->input('time_of_birth')) {
            if ($request->input('state')) {
                $validationRules['city'] = 'string';
            }
        }
        $validatedData = $request->validate($validationRules);
        $existingRecord = HoroscopeDetail::where('user_id', $user->id)->first();
        try {
            if ($existingRecord) {

                $existingRecord->update(array_merge($validatedData, ['place_of_birth' => $request->input('city', '')]));
                return redirect()->route('carrierDetails.create')->with('success', 'Horoscope details created successfully!');
            } else {

                HoroscopeDetail::create(array_merge($validatedData, ['place_of_birth' => $request->input('city', '')]));
                return redirect()->route('carrierDetails.create')->with('success', 'Horoscope details created successfully!');
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
