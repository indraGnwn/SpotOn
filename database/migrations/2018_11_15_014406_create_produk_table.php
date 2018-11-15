<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
              $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('CASCADE');
            $table->string('nama_produk');
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onUpdate('CASCADE');
            $table->string('lokasi');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
