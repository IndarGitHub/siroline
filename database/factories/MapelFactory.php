<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mapel;
use Faker\Generator as Faker;

$factory->define(Mapel::class, function (Faker $faker) {

    return [
        'nm_mapel' => $faker->word,
        'guru_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
