<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailNilaiBacaAlquransTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_baca_alqurans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('santri_id')->unsigned();
            $table->integer('nilai_baca_alquran_id')->unsigned();
            $table->integer('tajwid');
            $table->string('tajwid_huruf');
            $table->integer('kelancaran');
            $table->string('kel_huruf');
            $table->integer('makhorijul');
            $table->string('makho_huruf');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('santri_id')->references('id')->on('santris');
            $table->foreign('nilai_baca_alquran_id')->references('id')->on('nilai_baca_alqurans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_nilai_baca_alqurans');
    }
}
