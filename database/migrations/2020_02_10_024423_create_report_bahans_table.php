<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_bahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            //relasi ke master_bahan
            $table->integer('id_bahan');
            //relasi ke tabel unit
            $table->integer('id_satuan');
            $table->integer('jumlah');
            //created_at sbg tanggal
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
        Schema::dropIfExists('report_bahans');
    }
}
