<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
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
                        'name' => $fileName,
                        'dp_image' => 1,
                        'status' => 1,
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
                        'name' => $fileName,
                        'dp_image' => 1,
                        'status' => 1,
                    ]);
                    session(['registration_step' => 'done']);
                    session(['login' => 'yes']);
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
        dd($request->all());
    }

    public function addImage(Request $request)
    {

        $validateData = $request->validate([
            'photo2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect('error', 'Please Login your account!');
        }
        $imageCount = Image::where('user_id', $user->id)->count();
        if ($imageCount >= 5) {
            return redirect()->back()->with('error', 'You can only upload a maximum of five pictures!');
        }
        if ($imageCount === 0) {
            if ($request->hasFile('photo2')) {
                $file = $request->file('photo2');
                $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $filePath = public_path('storage/users/images/');
                $file->move($filePath, $fileName);
                Image::create([
                    'user_id' => $user->id,
                    'name' => $fileName,
                    'dp_image' => 1,
                    'status' => 1,
                ]);
    
                return redirect()->back()->with('success', 'Profile Picture has been uploaded successfully!');
            }
           
        }
        if ($request->hasFile('photo2')) {
            $file = $request->file('photo2');
            $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path('storage/users/images/');
            $file->move($filePath, $fileName);
            Image::create([
                'user_id' => $user->id,
                'name' => $fileName,
                'dp_image' => 0,
                'status' => 1,
            ]);

            return redirect()->back()->with('success', 'Picture has been uploaded successfully!');
        }
    }
    public function dpImage(Request $request)
    {

        $validateData = $request->validate([
            'id' => 'required|integer',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect('error', 'Please Login your account!');
        }
        $images = Image::where('user_id', $user->id)->get();
        foreach ($images as $key => $image) {
            $image->update([
                'dp_image' => 0,
                'status' => 1,
            ]);
        }

        $setDpImage = Image::where('id', $validateData['id'])->first();

        if (!$setDpImage) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        $setDpImage->update([
            'dp_image' => 1,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Photo has been uploaded as display picture successfully!');
    }

    public function changeImage(Request $request)
    {
        $validatedData = $request->validate([
            'photo3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id' => 'required|integer',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Please login!');
        }
        $image = Image::where('user_id', $user->id)->where('id', $validatedData['id'])->first();
        if ($request->hasFile('photo3')) {
            $file = $request->file('photo3');
            $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
            $this->changeImages($file, $image,  $fileName);
        }
        $image->update([
            'name' => $fileName,
            'dp_image' => 0,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', ' picture updated successfully!');
    }
    public function changeProfileImage(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo as an image
            'id' => 'required|integer', // Validate id as a required integer
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Please login!');
        }
        $image = Image::where('user_id', $user->id)->where('id', $validatedData['id'])->first();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
            $this->changeImages($file, $image,  $fileName);
        }
        $image->update([
            'name' => $fileName,
            'dp_image' => 1,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', ' Picture updated successfully!');
    }
    public function deleteImage(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Please login!');
        }

        $image = Image::where('user_id', $user->id)->where('id', $validatedData['id'])->first();

        $oneImage = Image::where('user_id', $user->id)->count();
        if ($oneImage === 1) {
            return redirect()->back()->with('error', 'Upload new photos then you can deleted the photo!');
        }

        $filePath = public_path('storage/users/images/');
        $previouseImage = $filePath . $image->name;
        if (File::exists($previouseImage)) {
            File::delete($previouseImage);
        }

        if (isset($image) && $image->dp_image === '1') {
            $lastDpImage = Image::where('user_id', $user->id)
                ->where('dp_image', '0')
                ->orderBy('created_at', 'desc')
                ->first();
            $image->delete();
            if ($lastDpImage) {
                $lastDpImage->update([
                    'dp_image' => '1',
                    'status' => 1,
                ]);
            }
            return redirect()->back()->with('success', 'Profile picture deleted successfully!');
        } else {
            $image->delete($validatedData['id']);

            return redirect()->back()->with('error', ' Picture deleted successfully!');
        }
    }
    private function changeImages($file, $image, $fileName)
    {

        $filePath = public_path('storage/users/images/');
        $file->move($filePath, $fileName);
        $previouseImage = $filePath . $image->name;
        if (File::exists($previouseImage)) {
            File::delete($previouseImage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
