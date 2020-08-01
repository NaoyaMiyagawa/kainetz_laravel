<?php

namespace Seeds\Local;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 確定
        factory(Application::class, 10)->create([
            'target_month_id' => 1,
            'status' => Application::STATUS_CONFIRMED,
        ]);

        // 締め
        factory(Application::class, 10)->create([
            'target_month_id' => 2,
            'status' => Application::STATUS_CLOSED,
        ]);

        // 差戻
        factory(Application::class, 10)->create([
            'target_month_id' => 2,
            'status' => Application::STATUS_RETURNED,
            'return_message' => '差し戻しメッセージサンプル',
        ]);

        // 申請中
        factory(Application::class, 10)->create();
    }
}
