<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisiteDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('requisite_documents', function (Blueprint $table) {
            $table->id();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('service_requisite_id');
            $table->unsignedBigInteger('document_type_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisite_documents');
    }
}
