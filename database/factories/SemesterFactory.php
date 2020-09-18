<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Semester;
use Faker\Generator as Faker;

$factory->define(Semester::class, function (Faker $faker) {

    return [
        'semester' => $faker->word,
        'thn_ajaran' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
