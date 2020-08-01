<?php

namespace Seeds\Local;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @package Seeds\Local
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # ----------------------------------------------
        # マスター用シーダー

        $this->call(\Seeds\Master\AccountTitlesTableSeeder::class);
        $this->call(\Seeds\Master\TransportsTableSeeder::class);
        $this->call(\Seeds\Master\ClosingNotificationSettingsTableSeeder::class);

        # ----------------------------------------------
        # Local用シーダー

        $this->call(\Seeds\Local\UsersTableSeeder::class);
        $this->call(\Seeds\Local\TargetMonthsTableSeeder::class);
        $this->call(\Seeds\Local\ApplicationsTableSeeder::class);
    }
}
