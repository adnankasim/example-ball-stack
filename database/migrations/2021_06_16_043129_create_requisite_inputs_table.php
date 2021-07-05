<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisiteInputsTable extends Migration
{
    public function up()
    {
        Schema::create('requisite_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('key');
            $table->string('type');
            $table->string('comment')->nullable();
            $table->text('options')->nullable();
            $table->text('extra_data')->nullable();
            $table->text('validation_rules')->nullable();
            $table->string('section')->nullable();
            $table->tinyInteger('sort_order');
            $table->unsignedBigInteger('service_requisite_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisite_inputs');
    }
}
