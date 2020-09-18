<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNilaiKeaktifansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_keaktifans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('semester_id')->references('id')->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilai_keaktifans');
    }
}
