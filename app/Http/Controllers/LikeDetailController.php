<?php

namespace App\Http\Controllers;

use App\Models\LikeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDetailController extends Controller
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
        return view('frontend.registration.likeDetails.create');
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
        $data = [
            'hobby' => $request->hobby ?? [],
            'interest' => $request->interest ?? [],
            'music' => $request->music ?? [],
            'dress' => $request->dress ?? [],
            'movie' => $request->movie ?? [],
            'sport' => $request->sport ?? [],
        ];

        $hobby = $this->arrayToCommaSeparatedString($data['hobby']);
        $interest = $this->arrayToCommaSeparatedString($data['interest']);
        $music = $this->arrayToCommaSeparatedString($data['music']);
        $dress = $this->arrayToCommaSeparatedString($data['dress']);
        $movie = $this->arrayToCommaSeparatedString($data['movie']);
        $sport = $this->arrayToCommaSeparatedString($data['sport']);

        $existingRecord = LikeDetail::where('user_id', $user->id)->first();

        try {
            if ($existingRecord) {

                $existingRecord->update([

                    'hobby' => $hobby,
                    'interest' => $interest,
                    'music' => $music,
                    'dress' => $dress,
                    'movie' => $movie,
                    'sport' => $sport,
                    'status' => 1,
                ]);
                session(['registration_step' => '10']);
                return redirect()->route('contactDetails.create')->with('success', 'Like details saved successfully!');
            } else {

                LikeDetail::create([
                    'user_id' => $user->id,
                    'hobby' => $hobby,
                    'interest' => $interest,
                    'music' => $music,
                    'dress' => $dress,
                    'movie' => $movie,
                    'sport' => $sport,
                    'status' => 1,
                ]);
                session(['registration_step' => '10']);
                return redirect()->route('contactDetails.create')->with('success', 'Like details saved successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    private function arrayToCommaSeparatedString(array $data): string
    {
        return implode(',', array_map('intval', $data)) . ',';
    }





    /**
     * Display the specified resource.
     */
    public function show(LikeDetail $likeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikeDetail $likeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LikeDetail $likeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeDetail $likeDetail)
    {
        //
    }
}
