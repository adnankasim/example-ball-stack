<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'issue_date' => 'date',
    ];

    // n to 1 submissions
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    // n to 1 bureaus
    public function bureau()
    {
        return $this->belongsTo(Bureaus::class, 'issuer_id');
    }

    // n to 1 users
    public function user()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
}
