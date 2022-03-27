<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_matkul', 32);
            $table->unsignedBigInteger('kode_dosen');
            $table->string('ruang');
            $table->string('waktu');
            $table->timestamps();

            $table->foreign("kode_matkul")->references("kd_matkul")->on("tbl_matkul");
            $table->foreign("kode_dosen")->references("id")->on("tbl_dosen");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_jadwal');
    }
}
