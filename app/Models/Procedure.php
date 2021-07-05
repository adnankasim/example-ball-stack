<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 services
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // 1 to n submission_progresses
    public function submissionProgresses()
    {
        return $this->hasMany(SubmissionProgress::class);
    }

    // n to n users via procedure_validators
    public function procedureValidators()
    {
        return $this->belongsToMany(User::class, 'procedure_validators')->withTimestamps();
    }

}
