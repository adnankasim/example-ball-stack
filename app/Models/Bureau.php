<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 1 to n products
    public function products()
    {
        return $this->hasMany(Product::class, 'issuer_id');
    }

    // 1 to n bureau_staffs
    public function bureauStaffs()
    {
        return $this->hasMany(BureauStaff::class);
    }

    // 1 to n services
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // 1 to n files
    // untuk penyimpanan logo biro
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

}
