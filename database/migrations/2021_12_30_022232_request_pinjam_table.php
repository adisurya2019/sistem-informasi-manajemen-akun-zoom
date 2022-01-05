<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestPinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_table', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->bigInteger('zoom_id')->unsigned();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('durasi');
            $table->integer('status_aksi')->nullable();
            $table->string('email_user');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('peminjaman_table', function (Blueprint $table){
            $table->foreign('zoom_id')->references('id_zoom')->on('akunzoom_table')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_table');
    }
}
