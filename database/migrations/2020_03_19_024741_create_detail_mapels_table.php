<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailMapelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nilai_ujian_tulis_id')->unsigned();
            $table->integer('mapel_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nilai_ujian_tulis_id')->references('id')->on('nilai_ujian_tulis');
            $table->foreign('mapel_id')->references('id')->on('mapels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_mapels');
    }
}
