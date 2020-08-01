<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transport;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {
    $now = now();

    return [
        'display_order' => null,
        'name' => $faker->word,
        'account_title_id' => 1,
        'user_permission_flg' => true,
        'admin_permission_flg' => true,

        'deleted_at' => null,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
