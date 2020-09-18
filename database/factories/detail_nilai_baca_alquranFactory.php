<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detail_nilai_baca_alquran;
use Faker\Generator as Faker;

$factory->define(detail_nilai_baca_alquran::class, function (Faker $faker) {

    return [
        'santri_id' => $faker->randomDigitNotNull,
        'nilai_baca_alquran_id' => $faker->randomDigitNotNull,
        'tajwid' => $faker->randomDigitNotNull,
        'kelancaran' => $faker->randomDigitNotNull,
        'makhorijul' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
