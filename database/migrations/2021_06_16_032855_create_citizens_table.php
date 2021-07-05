<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id()->comment('NIK');
            $table->string('kk_number')->nullable();
            $table->string('full_name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('sex', ['m', 'f'])->default('f');
            $table->enum('citizenship', ['wni', 'wna'])->default('wni');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citizens');
    }
}
