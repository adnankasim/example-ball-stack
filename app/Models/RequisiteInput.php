<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisiteInput extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 service_requisites
    public function serviceRequisite()
    {
        return $this->belongsTo(ServiceRequisite::class);
    }

    // 1 to n submission_datas
    public function submissionDatas()
    {
        return $this->hasMany(SubmissionData::class);
    }


}
