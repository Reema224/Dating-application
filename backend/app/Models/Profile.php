<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Profile extends Model
// {
// use HasFactory;

// protected $table = 'profiles';
// protected $fillable= [
//     'user_id',
//     'bio',
//     'location',
//     'gender',
//     'age'
// ];
// }
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiless';

    protected $fillable = [
        'user_id',
        'bio',
        'location',
        'gender',
        'age'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($profile) {
            if ($profile->user_id) {
                $existingProfile = self::where('user_id', $profile->user_id)->first();
                if ($existingProfile) {
                    $existingProfile->update($profile->attributesToArray());
                    return false;
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
