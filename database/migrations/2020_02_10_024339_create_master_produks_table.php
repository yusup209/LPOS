<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            //relasi ke table unit
            $table->integer('id_unit');
            //relasi ke table kurs
            $table->integer('id_kurs');
            //relasi ke table kategori
            $table->integer('id_kategori');
            $table->float('harga_jual');
            $table->float('harga_beli');
            $table->integer('diskon');
            $table->string('stok');
            $table->string('barcode');
            $table->string('status');
            $table->string('expired');
            $table->string('print_label');
            $table->string('ganti_harga');
            $table->text('keterangan');
            $table->float('untung');
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
        Schema::dropIfExists('master_produks');
    }
}
