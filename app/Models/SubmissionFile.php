<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 files
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    // n to 1 service_requisites
    public function serviceRequisite()
    {
        return $this->belongsTo(ServiceRequisite::class);
    }

    // n to 1 submissions
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

}
