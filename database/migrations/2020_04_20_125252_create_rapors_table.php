<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRaporsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detail_nilai_ujian_tulis_id')->unsigned();
            $table->integer('detail_mapel_id')->unsigned();
            $table->integer('detail_nilai_hafalan_id')->unsigned();
            $table->integer('detail_nilai_baca_alquran_id')->unsigned();
            $table->integer('detail_nilai_keaktifan_id')->unsigned();
            $table->integer('rata_rata');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('detail_nilai_ujian_tulis_id')->references('id')->on('detail_nilai_ujian_tulis');
            $table->foreign('detail_mapel_id')->references('id')->on('detail_mapels');
            $table->foreign('detail_nilai_hafalan_id')->references('id')->on('detail_nilai_hafalans');
            $table->foreign('detail_nilai_baca_alquran_id')->references('id')->on('detail_nilai_baca_alqurans');
            $table->foreign('detail_nilai_keaktifan_id')->references('id')->on('detail_nilai_keaktifans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rapors');
    }
}
