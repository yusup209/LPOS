<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiSementarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sementaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            //pertama kali generatenya disini!
            $table->string('no_ref');
            //relasi ke table produk
            $table->integer('id_produk');
            $table->integer('qty');
            $table->float('harga');
            $table->float('subtotal');;
            $table->string('barcode');
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
        Schema::dropIfExists('transaksi_sementaras');
    }
}
