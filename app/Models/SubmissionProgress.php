<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dispatched_at' => 'datetime',
        'validated_at' => 'datetime',
    ];

    // n to 1 submissions
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    // n to 1 procedures
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    // n to 1 users
    public function user()
    {
        return $this->belongsTo(User::class, 'validator_id');
    }
}
