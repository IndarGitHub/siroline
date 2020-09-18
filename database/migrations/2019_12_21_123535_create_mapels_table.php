<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMapelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_mapel')->unique();
            $table->string('nm_mapel');
            $table->integer('guru_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('guru_id')->references('id')->on('gurus');
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mapels');
    }
}
