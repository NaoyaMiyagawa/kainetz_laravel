<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Application;
use App\Models\AccountTitle;
use App\Models\Transport;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    $now = now();
    $price = $faker->numberBetween(100, 1000);
    $formType = $faker->numberBetween(AccountTitle::FORM_A, AccountTitle::FORM_D);
    $roundtripFlg = $faker->boolean();

    $addForm = [];

    switch ($formType) {
        case AccountTitle::FORM_A:
            $addForm = [
                'account_title_id' => 1,
                'project_visit' => $faker->text(10),
                'transport_id' => $faker->numberBetween(1, Transport::count()),
                'departure' => $faker->city,
                'destination' => $faker->city,
                'roundtrip_flg' => $roundtripFlg,
                'total_price' => $roundtripFlg ? $price * 2 : $price,
            ];
            // ガソリン代対策
            $addForm['account_title_id'] = Transport::find($addForm['transport_id'])->account_title_id;
            break;

        case AccountTitle::FORM_B:
            $addForm = [
                'account_title_id' => $faker->numberBetween(2, 3),
                'project_client' => $faker->text(15),
                'payee' => $faker->text(15),
            ];
            break;

        case AccountTitle::FORM_C:
            $addForm = [
                'account_title_id' => $faker->numberBetween(4, 7),
                'payee' => $faker->text(15),
            ];
            break;

        case AccountTitle::FORM_D:
            $addForm = [
                'account_title_id' => $faker->numberBetween(8, 13),
                'description' => $faker->text(30),
            ];
            break;
    }

    return array_merge([
        'user_id' => 1,
        'target_month_id' => 3,
        'used_date' => $faker->dateTimeBetween($now->subMonth(), $now)->format('Y-m-d'),
        'submitted_date' => $faker->dateTimeBetween($now->subMonth(), $now)->format('Y-m-d'),

        // ↓勘定科目により動的↓
        // FORM_A
        'account_title_id' => null,
        'project_visit' => null,
        'transport_id' => null,
        'departure' => null,
        'destination' => null,
        'roundtrip_flg' => false,
        // FORM_B
        'project_client' => null,
        // FORM_B,C
        'payee' => null,
        // FORM_C
        'purpose_content' => null,
        // FORM_D
        'description' => null,
        // ↑勘定科目により動的↑

        'price' => $price,
        'total_price' => $price,
        'comment' => $faker->text(30),
        'status' => Application::STATUS_APPLIED,
        'return_message' => null,
        'confirm_flg' => false,
        'admin_submit_flg' => $faker->boolean(),

        'deleted_at' => null,
        'created_at' => $now,
        'updated_at' => $now,
    ], $addForm);
});
