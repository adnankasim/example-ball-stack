<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 1 to n submissions
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'applicant_id');
    }

    // n to 1 user
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // 1 to n files
    // untuk penyimpanan photo, ktp, & photo with ktp
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

}
