<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BureauStaff extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 roles
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // n to 1 bureaus
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    // n to 1 users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
