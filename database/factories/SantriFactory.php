<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Santri;
use Faker\Generator as Faker;

$factory->define(Santri::class, function (Faker $faker) {

    return [
        'no_induk' => $faker->word,
        'nm_santri' => $faker->word,
        'tmp_lhr' => $faker->word,
        'tgl_lhr' => $faker->word,
        'jk' => $faker->word,
        'kelas_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
