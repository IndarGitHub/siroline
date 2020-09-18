<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\rapor;
use Faker\Generator as Faker;

$factory->define(rapor::class, function (Faker $faker) {

    return [
        'detail_nilai_ujian_tulis_id' => $faker->randomDigitNotNull,
        'detail_mapel_id' => $faker->randomDigitNotNull,
        'detail_nilai_hafalan_id' => $faker->randomDigitNotNull,
        'detail_nilai_baca_alquran_id' => $faker->randomDigitNotNull,
        'detail_nilai_keaktifan_id' => $faker->randomDigitNotNull,
        'rata_rata' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
