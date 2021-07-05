<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 1 to n bureau_staffs
    public function bureauStaffs()
    {
        return $this->hasMany(BureauStaff::class);
    }

}
