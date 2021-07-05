<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequisitesTable extends Migration
{
    public function up()
    {
        Schema::create('service_requisites', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->unsignedInteger('kind')->default(0);
            $table->boolean('is_required')->default(true);
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_requisites');
    }
}
