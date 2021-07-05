<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration
{
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->unsignedInteger('sequence')->nullable()->comment('deleted = null');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}
