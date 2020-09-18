<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detail_Mapel;
use Faker\Generator as Faker;

$factory->define(Detail_Mapel::class, function (Faker $faker) {

    return [
        'nilai_ujian_tulis_id' => $faker->randomDigitNotNull,
        'mapel_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
