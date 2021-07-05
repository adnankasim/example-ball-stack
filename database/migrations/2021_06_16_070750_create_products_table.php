<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable()->comment('identitas produk, mis. nomer surat');
            $table->text('notes')->nullable();
            $table->date('issue_date')->nullable();

            $table->unsignedBigInteger('issuer_id');
            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('uploader_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
