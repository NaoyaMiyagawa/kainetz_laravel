<?php

namespace Seeds\Local;

use App\Models\TargetMonth;
use Illuminate\Database\Seeder;

class TargetMonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $year = $now->year;
        $month = $now->month;

        $seeds = [
            // 先々月 (確定)
            [
                'month' => $month - 2,
                'announce_flg' => true,
                'closed_date' => $now->setDate($year, $month - 2, 28)->format('Y-m-d'),
                'status' => TargetMonth::STATUS_CONFIRMED,
            ],
            // 先月 (締め)
            [
                'month' => $month - 1,
                'closed_date' => $now->setDate($year, $month - 1, 28)->format('Y-m-d'),
                'status' => TargetMonth::STATUS_CLOSED,
            ],
            // 今月
            [
                'month' => $month,
                'closed_date' => null,
                'status' => TargetMonth::STATUS_APPLIED,
            ],
        ];

        foreach ($seeds as $seed) {
            factory(TargetMonth::class)->create($seed);
        }
    }
}
