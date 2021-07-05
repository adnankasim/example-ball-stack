<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 submissions
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    // n to 1 user
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
