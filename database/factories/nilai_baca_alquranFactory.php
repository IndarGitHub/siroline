<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\nilai_baca_alquran;
use Faker\Generator as Faker;

$factory->define(nilai_baca_alquran::class, function (Faker $faker) {

    return [
        'mapel_id' => $faker->randomDigitNotNull,
        'semester_id' => $faker->randomDigitNotNull,
        'kelas_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
