<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailNilaiKeaktifansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_keaktifans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('santri_id')->unsigned();
            $table->integer('nilai_keaktifan_id')->unsigned();
            $table->integer('nilai_angka1');
            $table->string('qiroatul_quran');
            $table->integer('nilai_angka2');
            $table->string('muhadhoroh');
            $table->integer('nilai_angka3');
            $table->string('maulid_diba');
            $table->integer('nilai_angka4');
            $table->string('kelakuan');
            $table->integer('nilai_angka5');
            $table->string('kerajinan');
            $table->integer('nilai_angka6');
            $table->string('kerapian');
            $table->integer('ket_sakit');
            $table->integer('ket_izin');
            $table->integer('tanpa_ket');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('santri_id')->references('id')->on('santris');
            $table->foreign('nilai_keaktifan_id')->references('id')->on('nilai_keaktifans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_nilai_keaktifans');
    }
}
