<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = ['password'];

    protected $casts = [
        'validated_at' => 'datetime',
    ];

    // 1 to n citizens
    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    // 1 to n submission_messages
    public function submissionMessages()
    {
        return $this->hasMany(SubmissionMessage::class, 'sender_id');
    }

    // 1 to n submissions
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'submitter_id');
    }

    // 1 to n submission_progresses
    public function submissionProgresses()
    {
        return $this->hasMany(submissionprogress::class, 'validator_id');
    }

    // n to n procedure via procedure_validators
    public function procedureValidators()
    {
        return $this->belongsToMany(Procedure::class, 'procedure_validators')->withTimestamps();
    }

}
