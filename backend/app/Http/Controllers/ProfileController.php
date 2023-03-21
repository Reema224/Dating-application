<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show(Profile $profile)
    {
        return response()->json(['profile' => $profile]);
    }

     public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 401);
        }

        $profile = $user->profile ?? new Profile();
        $profile->fill($request->all());
        $profile->user_id = $user->id;
        $profile->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile created successfully',
            'profile' => $profile
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $user = Auth::user();
        if (!$user || $profile->user_id !== $user->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 401);
        }

        $profile->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ]);
    }


    public function getByAgeAndLocation(Request $request)
{
    $age = $request->input('age');
    $location = $request->input('location');

    $query = Profile::query();

    if ($age) {
        $query->where('age', $age);
    }

    if ($location) {
        $query->where('location', $location);
    }

    $profiles = $query->get();

    return response()->json(['profiles' => $profiles]);
}

}



