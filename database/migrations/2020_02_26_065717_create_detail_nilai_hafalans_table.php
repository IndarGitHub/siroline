<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailNilaiHafalansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilai_hafalans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('santri_id')->unsigned();
            $table->integer('nilai_hafalan_id')->unsigned();
            $table->integer('kelancaran');
            $table->string('nilai_huruf');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('santri_id')->references('id')->on('santris');
            $table->foreign('nilai_hafalan_id')->references('id')->on('nilai_hafalans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_nilai_hafalans');
    }
}
