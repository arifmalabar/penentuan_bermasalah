<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kelas', function (Blueprint $table) {
            $table->bigIncrements('kode_kelas');
            $table->unsignedBigInteger('kode_jurusan');
            $table->char('NIP', 50);
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('tb_jurusan');
            $table->foreign('NIP')->references('NIP')->on('tb_guru');
            $table->string('nama_jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
