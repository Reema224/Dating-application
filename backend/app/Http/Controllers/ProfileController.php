<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
class ProfileController extends Controller
{
    public function store(Request $request)
{
    $profile = new Profile;
    $profile->user_id = $request->user_id;
    $profile->bio = $request->bio;
    $profile->age = $request->age;
    $profile->location = $request->location;
    $profile->gender = $request->gender;
    $profile->save();

    return response()->json([
        'message' => 'Profile created successfully',
        'profile' => $profile
    ], 201);
}

}
