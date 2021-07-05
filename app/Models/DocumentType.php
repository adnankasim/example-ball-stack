<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 1 to n requisite_documents
    public function requisiteDocuments()
    {
        return $this->hasMany(RequisiteDocument::class, 'doc_type_id');
    }


}
