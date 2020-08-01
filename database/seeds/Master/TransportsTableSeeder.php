<?php

namespace Seeds\Master;

use App\Models\Transport;
use Illuminate\Database\Seeder;

class TransportsTableSeeder extends Seeder
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
                'name' => '電車',
            ],
            [
                'name' => 'バス',
            ],
            [
                'name' => '新幹線',
            ],
            [
                'name' => 'タクシー',
            ],
            [
                'name' => '駐車場',
            ],
            [
                'name' => '航空券',
            ],
            [
                'name' => '宿泊費',
            ],
            [
                'name' => '出張手当',
            ],
            [
                'name' => 'ガソリン代',
                'account_title_id' => 6,
            ],
            [
                'name' => '高速代',
            ],
            [
                'name' => 'その他',
            ],
            [
                'name' => '会場費',
            ]
        ];

        foreach ($seeds as $index => $seed) {
            $seed['display_order'] = $index;

            factory(Transport::class)->create($seed);
        }
    }
}
