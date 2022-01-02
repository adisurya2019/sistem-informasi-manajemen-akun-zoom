<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AkunZoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akunzoom_table', function (Blueprint $table) {
            $table->id('id_zoom');
            $table->string('nama_akun');
            $table->integer('kapasitas');
            $table->integer('status_peminjaman')->nullable()->default('1');
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
        Schema::dropIfExists('akunzoom_table');
    }
}
