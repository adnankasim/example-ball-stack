<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisiteDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    // n to 1 service_requisites
    public function serviceRequisite()
    {
        return $this->belongsTo(ServiceRequisite::class);
    }

    // n to 1 document_types
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
