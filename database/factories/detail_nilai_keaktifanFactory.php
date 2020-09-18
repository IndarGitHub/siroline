<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detail_nilai_keaktifan;
use Faker\Generator as Faker;

$factory->define(detail_nilai_keaktifan::class, function (Faker $faker) {

    return [
        'santri_id' => $faker->randomDigitNotNull,
        'nilai_keaktifan_id' => $faker->randomDigitNotNull,
        'qiroatul_quran' => $faker->word,
        'muhadhoroh' => $faker->word,
        'maulid_diba' => $faker->word,
        'kelakuan' => $faker->word,
        'kerajinan' => $faker->word,
        'kerapian' => $faker->word,
        'ket_sakit' => $faker->randomDigitNotNull,
        'ket_izin' => $faker->randomDigitNotNull,
        'tanpa_ket' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
