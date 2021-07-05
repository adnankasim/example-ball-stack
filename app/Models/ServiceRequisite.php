<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequisite extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 services
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // 1 to n submission_files
    public function submissionFiles()
    {
        return $this->hasMany(SubmissionFile::class);
    }

    // 1 to n requisite_documents
    public function requisiteDocuments()
    {
        return $this->hasMany(RequisiteDocument::class);
    }

    // 1 to n requisite_inputs
    public function RequisiteInputs()
    {
        return $this->hasMany(RequisiteInput::class);
    }

}
