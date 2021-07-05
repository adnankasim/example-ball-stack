<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 1 to n submission_files
    public function submissionFiles()
    {
        return $this->hasMany(SubmissionFile::class);
    }

    public function fileable()
    {
        return $this->morphTo();
    }

}
