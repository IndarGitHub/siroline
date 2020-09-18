<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSantrisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_induk')->unique();
            $table->string('nm_santri');
            $table->string('tmp_lhr');
            $table->string('tgl_lhr');
            $table->boolean('jk');
            $table->integer('kelas_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->string('nm_ayah');
            $table->string('nm_ibu');
            $table->string('nm_wali_santri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('santris');
    }
}
