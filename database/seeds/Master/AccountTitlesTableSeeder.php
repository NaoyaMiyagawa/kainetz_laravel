<?php

namespace Seeds\Master;

use App\Models\AccountTitle;
use Illuminate\Database\Seeder;

class AccountTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'name' => '旅費交通費',
                'account_code' => '6112',
                'form_group' => AccountTitle::FORM_A,
                'user_permission_flg' => true,
            ],
            [
                'name' => '接待交際費',
                'account_code' => '6223',
                'form_group' => AccountTitle::FORM_B,
            ],
            [
                'name' => '会議費',
                'account_code' => '6117',
                'form_group' => AccountTitle::FORM_B,
            ],
            [
                'name' => '消耗品費',
                'account_code' => '6217',
                'form_group' => AccountTitle::FORM_C,
            ],
            [
                'name' => '図書研修費',
                'account_code' => '6229',
                'form_group' => AccountTitle::FORM_C,
                'user_permission_flg' => true,
            ],
            [
                'name' => '車両関連費',
                'account_code' => '6228',
                'form_group' => AccountTitle::FORM_C,
            ],
            [
                'name' => '雑費',
                'account_code' => '6231',
                'form_group' => AccountTitle::FORM_C,
            ],
            [
                'name' => '福利厚生費',
                'account_code' => '6226',
                'form_group' => AccountTitle::FORM_D,
            ],
            [
                'name' => '広告宣伝費',
                'account_code' => '6113',
                'form_group' => AccountTitle::FORM_D,
            ],
            [
                'name' => '通信費',
                'account_code' => '6218',
                'form_group' => AccountTitle::FORM_D,
            ],
            [
                'name' => '手数料',
                'account_code' => '6227',
                'form_group' => AccountTitle::FORM_D,
            ],
            [
                'name' => '諸会費',
                'account_code' => '6116',
                'form_group' => AccountTitle::FORM_D,
            ],
            [
                'name' => '採用費',
                'account_code' => '6337',
                'form_group' => AccountTitle::FORM_D,
            ]
        ];

        foreach ($seeds as $index => $seed) {
            $seed['display_order'] = $index;

            factory(AccountTitle::class)->create($seed);
        }
    }
}
