<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('submission_messages', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('sender_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('submission_messages');
    }
}
