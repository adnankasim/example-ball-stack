<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('state');
            $table->text('notes')->nullable();
            $table->dateTime('submitted_at')->comment('refresh datetime on resubmit');
            $table->dateTime('closed_at')->nullable();
            $table->dateTime('latest_activity');
            $table->unsignedTinyInteger('latest_procedure_sequence')->nullable()->comment('tahapan prosedur sukses terakhir');

            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('submitter_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
