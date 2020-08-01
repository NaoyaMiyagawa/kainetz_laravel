<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $now = now();

    return [
        'name' => $faker->name,
        'loginid' => $faker->username,
        'password' => $faker->password,
        'remember_token' => Str::random(10),
        'employee_code' => $faker->unique()->numberBetween(300, 500),
        'slackid' => null,
        'admin_flg' => false,
        'retire_flg' => $faker->boolean(10),

        'deleted_at' => null,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
