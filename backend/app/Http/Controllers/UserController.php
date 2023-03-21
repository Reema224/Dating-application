<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{

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

public function searchByName(Request $request)
{
    $name = $request->input('name');
    $users = User::where('name', 'LIKE', '%' . $name . '%')->get();

    return response()->json(['users' => $users]);
}

public function oppositeGenderProfiles($gender)
{
    $oppositeGender = $gender === 'male' ? 'female' : 'male';
    $profiles = Profile::where('gender', $oppositeGender)->get();

    return response()->json(['profiles' => $profiles]);
}
}
