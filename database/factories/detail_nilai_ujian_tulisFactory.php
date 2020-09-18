<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detail_nilai_ujian_tulis;
use Faker\Generator as Faker;

$factory->define(detail_nilai_ujian_tulis::class, function (Faker $faker) {

    return [
        'santri_id' => $faker->randomDigitNotNull,
        'detail_mapel_id' => $faker->randomDigitNotNull,
        'nilai_angka' => $faker->randomDigitNotNull,
        'nilai_huruf' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
