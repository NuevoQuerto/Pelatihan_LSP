<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_krs', function (Blueprint $table) {
            $table->string('nama');
            $table->string('id_semester_registrasi', 32);
            $table->timestamps();

            $table->foreign("id_semester_registrasi")->references("id_semester_registrasi")->on("tbl_semester");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_krs');
    }
}
