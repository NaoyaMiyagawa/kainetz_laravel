<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        # 環境ごとでSeedの切り替え

        $envName = Str::studly(App::Environment());

        $seederClass = 'Seeds\\' . $envName . '\\DatabaseSeeder';

        $this->call($seederClass);
    }
}
