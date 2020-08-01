<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TargetMonth;
use Faker\Generator as Faker;

$factory->define(TargetMonth::class, function (Faker $faker) {
    $now = now();

    return [
        'year' => $now->year,
        'month' => $faker->numberBetween(1, 12),
        'announce_flg' => false,
        'closed_date' => null,
        'status' => TargetMonth::STATUS_CONFIRMED,

        'deleted_at' => null,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
