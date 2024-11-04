<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
        return view('frontend.registration.imgaes.create');
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

        // Retrieve fields from config
        $fields = config('formFields.images');
        $validationRules = [];

        foreach ($fields as $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        $validatedData = $request->validate($validationRules);

        $existingRecord = Image::where('user_id', $user->id)->first();

        try {
            if ($existingRecord) {
                if ($request->hasFile('display_picture')) {
                    $file = $request->file('display_picture');
                    $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path('storage/users/images/');
                    $file->move($filePath, $fileName);
                    $previousFilePath = $filePath . $existingRecord->display_picture;
                    if (File::exists($previousFilePath)) {
                        File::delete($previousFilePath);
                    }
                    $existingRecord->update([
                        'display_picture' => $fileName,
                    ]);
                    session(['registration_step' => 'done']);
                }
                return redirect()->route('dashboard')->with('success', 'Display picture updated successfully!');
            } else {
                if ($request->hasFile('display_picture')) {
                    $file = $request->file('display_picture');
                    $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path('storage/users/images/');
                    $file->move($filePath, $fileName);
                    Image::create([
                        'user_id' => $user->id,
                        'display_picture' => $fileName,
                    ]);
                    session(['registration_step' => 'done']);
                   
                }
                return redirect()->route('dashboard')->with('success', 'Display picture saved successfully!');
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
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
