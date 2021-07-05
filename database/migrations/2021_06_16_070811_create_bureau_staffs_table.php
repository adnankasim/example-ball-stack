<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBureauStaffsTable extends Migration
{
    public function up()
    {
        Schema::create('bureau_staffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bureau_id');
            $table->unsignedBigInteger('backend_user_id');
            $table->unsignedBigInteger('role_id');
            $table->text('notes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bureau_staffs');
    }
}
