<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 bureaus
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    // 1 to n submissions
    public function submissions()
    {
        return $this->hasMany(Submissions::class);
    }

    // 1 to n service_requisites
    public function serviceRequisites()
    {
        return $this->hasMany(ServiceRequisite::class);
    }

    // 1 to n procedures
    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }
}
