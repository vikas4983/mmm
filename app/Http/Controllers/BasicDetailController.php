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
        return 'success';
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
        if (in_array($request->marital_status, ['2', '3', '4', '5'])) {
            $validationRules['children'] = 'required|string';
        } elseif ($request->marital_status == '1') {
            $validationRules['children'] = 'nullable|string';
        }
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated!');
        }
        try {
            foreach ($fields as $key => $field) {
                if ($request->input('religion')) {
                    $validationRules['caste'] = 'required|string';
                } else {
                    return redirect()->back()->with('error', 'Religion must be selected!');
                }
                $validationRules[$field['name']] = $field['rules'];
            }
            $validatedData = $request->validate($validationRules);
            $validatedData['user_id'] = $user->id;
            $validatedData['children'] = $request->marital_status == '1' ? null : $request->input('children');
            $existingRecord = BasicDetail::where('user_id', $user->id)->first();
            if ($existingRecord) {
                $existingRecord->update(array_merge($validatedData, ['status' => 1]));
                session(['registration_step' => '5']);
                
                return redirect()->route('horoscopes.create')->with('success', 'Basic details updated successfully!');
            } else {
                BasicDetail::create(array_merge($validatedData, ['status' => 1]));
                session(['registration_step' => '5']);
                return redirect()->route('horoscopes.create')->with('success', 'Basic details saved successfully!');
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
