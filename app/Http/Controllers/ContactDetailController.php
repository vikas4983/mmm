<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactDetailController extends Controller
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
        return view('frontend.registration.contactdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $user = Auth::user();
        if (!$user) {

            return redirect()->back()->with('error', 'User not authenticated!');
        }
        $fields = config('formFields.contactDetails');
        $validationRules = [];
        foreach ($fields as $field) {

            $validationRules[$field['name']] = $field['rules'];
        }
        $validatedData = $request->validate($validationRules);

        $validatedData['user_id'] = $user->id;
        $validatedData['status'] = 1;

        $existingRecord = ContactDetail::where('user_id', $user->id)->first();
        try {

            if ($existingRecord) {
                $existingRecord->update($validatedData);
                session(['registration_step' => '11']);
                return redirect()->route('images.create')->with('success', 'Completed your profile, now fins your life partner!');
            } else {

                ContactDetail::create($validatedData); 
                session(['registration_step' => '11']);
                return redirect()->route('images.create')->with('success', 'Completed your profile, now fins your life partner!');
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
    public function show(ContactDetail $contactDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactDetail $contactDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactDetail $contactDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactDetail $contactDetail)
    {
        //
    }
}
