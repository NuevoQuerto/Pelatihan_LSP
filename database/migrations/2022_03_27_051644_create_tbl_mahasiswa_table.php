<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->string('nim', 12)->primary();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telpon', 18);
            $table->date('tanggal_lahir');
            $table->string('foto');
            $table->enum('kelamin', ['L', 'P']);
            $table->enum('shift', ['A', 'B', 'C']);
            $table->string('semester', 4);
            $table->date('tanggal_diterima');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
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
        Schema::dropIfExists('tbl_mahasiswa');
    }
}
