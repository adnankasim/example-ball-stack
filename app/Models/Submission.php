<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'submitted_at' => 'datetime',
        'closed_at' => 'datetime',
        'latest_activity' => 'datetime',
    ];

    // 1 to n submission_progresses
    public function submissionProgresses()
    {
        return $this->hasMany(SubmissionProgress::class);
    }

    // 1 to n products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 1 to n submission_messages
    public function submissionMessages()
    {
        return $this->hasMany(SubmissionMessage::class);
    }

    // 1 to n submission_files
    public function submissionFiles()
    {
        return $this->hasMany(SubmissionFile::class);
    }

    // 1 to n submission_datas
    public function submissionDatas()
    {
        return $this->hasMany(SubmissionData::class);
    }

    // n to 1 services
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // n to 1 citizens
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'applicant_id');
    }

    // n to 1 users
    public function user()
    {
        return $this->belongsTo(User::class, 'submitter_id');
    }

}
