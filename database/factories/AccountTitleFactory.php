<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AccountTitle;
use Faker\Generator as Faker;

$factory->define(AccountTitle::class, function (Faker $faker) {
    $now = now();

    return [
        'name' => $faker->word(10),
        'account_code' => $faker->numberBetween(6000, 6200),
        'form_group' => null,
        'display_order' => null,
        'user_permission_flg' => false,
        'admin_permission_flg' => true,

        'deleted_at' => null,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
