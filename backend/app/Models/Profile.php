<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
use HasFactory;

// public function profile()
// {
//   return $this->hasOne(Profile::class);
// }
protected $table = 'profiles';
protected $fillable= [
    'user_id',
    'bio',
    'location',
    'gender',
    'age'
];
}
