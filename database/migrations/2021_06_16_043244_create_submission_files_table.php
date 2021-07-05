<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionFilesTable extends Migration
{
    public function up()
    {
        Schema::create('submission_files', function (Blueprint $table) {
            $table->id();
            $table->text('notes');

            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('service_requisite_id');
            $table->unsignedBigInteger('submission_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('submission_files');
    }
}
