<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCttpelanggaransTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cttpelanggarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pelanggaran')->unique();
            $table->integer('santri_id')->unsigned();
            $table->string('tgl');
            $table->integer('tp_id')->unsigned();
            $table->text('catatan_pengasuh');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('santri_id')->references('id')->on('santris');
            $table->foreign('tp_id')->references('id')->on('tps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cttpelanggarans');
    }
}
