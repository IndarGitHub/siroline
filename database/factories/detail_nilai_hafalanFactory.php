<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detail_nilai_hafalan;
use Faker\Generator as Faker;

$factory->define(detail_nilai_hafalan::class, function (Faker $faker) {

    return [
        'santri_id' => $faker->randomDigitNotNull,
        'nilai_hafalan_id' => $faker->randomDigitNotNull,
        'kelancaran' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
