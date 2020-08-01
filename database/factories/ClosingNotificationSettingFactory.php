<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClosingNotificationSetting;
use Faker\Generator as Faker;

$factory->define(ClosingNotificationSetting::class, function (Faker $faker) {
    $now = now();

    return [
        'month' => null,
        'notification_date' => null,
        'closing_date' => null,

        'created_at' => $now,
        'updated_at' => $now,
    ];
});
