<?php

namespace App\Http\Controllers;

use App\Models\BasicDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicDetailController extends Controller
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
        return view('frontend.registration.basicDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fields = config('formFields.basicDetails');
        $validationRules = [];

        try {
            foreach ($fields as $key => $field) {
                if ($request->input('religion')) {
                    $validationRules['caste'] = 'required|string';
                } else {
                    return redirect()->back()->with('error', 'Religion must be selected!');
                }
                $validationRules[$field['name']] = $field['rules'];
            }

            $validateData = $request->validate($validationRules);

            if ($validateData) {
                if ($userId = Auth::user()) {
                    $validateData['user_id'] = $userId->id;
                    $existingRecord = BasicDetail::where('user_id', $userId->id)->first();

                    if ($existingRecord) {
                        $existingRecord->update($validateData);
                        return redirect()->route('horoscopes.create')->with('success', 'Basic details saved successfully!');
                    } else {
                        BasicDetail::create($validateData);
                        return redirect()->route('horoscopes.create')->with('success', 'Basic details saved successfully!');
                    }
                } else {
                    return redirect()->back()->with('error', 'User not authenticated!');
                }
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
    public function show(BasicDetail $basicDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BasicDetail $basicDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BasicDetail $basicDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BasicDetail $basicDetail)
    {
        //
    }
}
