<?php

namespace App\Http\Controllers;

use App\Models\CarrierDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrierDetailController extends Controller
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
        return view('frontend.registration.carrierDetails.create');
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
        $fields = config('formFields.carrierDetails');
        $validationRules = [];
        foreach ($fields as $field) {

            $validationRules[$field['name']] = $field['rules'];
        }

        if ($request->input('country')) {

            $validationRules['country'] = 'required|numeric';

            if ($request->input('state')) {

                $validationRules['state'] = 'required|numeric';
            }

            if ($request->input('city')) {

                $validationRules['city'] = 'required|numeric';
            }
            if ($request->input('employee')) {

                $validationRules['occupation'] = 'required|numeric';
            }
        }

        $validatedData = $request->validate($validationRules);

        $validatedData['user_id'] = $user->id;
        $validatedData['status'] = 1;
        $existingRecord = CarrierDetail::where('user_id', $user->id)->first();
        try {

            if ($existingRecord) {
                $existingRecord->update($validatedData);
                session(['registration_step' => '7']);
                return redirect()->route('familyDetails.create')->with('success', 'Carrier details saved successfully!');
            } else {

                CarrierDetail::create($validatedData);
                session(['registration_step' => '7']);
                return redirect()->route('familyDetails.create')->with('success', 'Carrier details saved successfully!');
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
    public function show(CarrierDetail $carrierDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarrierDetail $carrierDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarrierDetail $carrierDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarrierDetail $carrierDetail)
    {
        //
    }
}
