<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cttpelanggaran;
use Faker\Generator as Faker;

$factory->define(Cttpelanggaran::class, function (Faker $faker) {

    return [
        'santri_id' => $faker->word,
        'tgl' => $faker->word,
        'pelanggaran' => $faker->text,
        'tp_id' => $faker->word,
        'sanksi' => $faker->text,
        'catatan_pengasuh' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
