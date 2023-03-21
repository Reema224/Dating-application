<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Block;


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

public function oppositeGenderProfiles($gender)
{
    $oppositeGender = $gender === 'male' ? 'female' : 'male';
    $profiles = Profile::where('gender', $oppositeGender)->get();

    return response()->json(['profiles' => $profiles]);
}


public function favorite(Request $request, Profile $profile)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized'
        ], 401);
     }

    $favorite = Favorite::firstOrNew([
        'favorite_user_id' => $user->id,
        'favorited_user_id' => $profile->user_id
    ]);

    $favorite->save();

    return response()->json([
        'status' => 'success',
        'message' => 'User favorited successfully'
    ]);
}

public function block(Request $request, Profile $profile)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized'
        ], 401);
    }

    $block = Block::firstOrNew([
        'block_user_id' => $user->id,
        'blocked_user_id' => $profile->user_id
    ]);

    $block->save();

    return response()->json([
        'status' => 'success',
        'message' => 'User blocked successfully'
    ]);
}
}



