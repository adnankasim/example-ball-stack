<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionData extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 submissions
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    // n to 1 requisite_inputs
    public function requisiteInput()
    {
        return $this->belongsTo(RequisiteInput::class);
    }
}
