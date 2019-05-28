<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barang');
            $table->enum('kondisi',['Baik','Tidak Baik']);
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->integer('jenis_id')->unsigned();
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->integer('ruang_id')->unsigned();
            $table->foreign('ruang_id')->references('id')->on('ruang')->onDelete('cascade');
            $table->integer('petugas_id')->unsigned();
            $table->foreign('petugas_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kd_barang');
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
        Schema::dropIfExists('barang');
    }
}
