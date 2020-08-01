<?php

namespace Seeds\Master;

use App\Models\ClosingNotificationSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClosingNotificationSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = now()->year;
        $month = now()->month;

        for ($m = 1; $m <= 12; $m++) {
            $settingYear = ($m < $month) ? $year + 1 : $year;
            $date = Carbon::create($settingYear, $m, 1);
            $closingDate = $date->copy()->endOfMonth()->subDays(3);
            $notificationDate = $closingDate->copy()->subDays(3);

            $seed = [
                'month' => $date->month,
                'closing_date' => $closingDate->format('Y-m-d'),
                'notification_date' => $notificationDate->format('Y-m-d'),
            ];

            factory(ClosingNotificationSetting::class)->create($seed);
        }
    }
}
