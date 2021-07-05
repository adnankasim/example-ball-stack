<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionProgressesTable extends Migration
{
    public function up()
    {
        Schema::create('submission_progresses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('state');
            $table->text('notes');
            $table->dateTime('dispatched_at');
            $table->dateTime('validated_at')->nullable();

            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('validator_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('submission_progresses');
    }
}
