<?php

namespace Seeds\Local;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $seeds = [
            // 管理者
            [
                'name' => 'admin',
                'password' => Hash::make('secret'),
                'employee_code' => 100,
                'admin_flg' => true,
                'retire_flg' => false,
            ],
            // ユーザー01
            [
                'name' => 'user01',
                'password' => Hash::make('secret'),
                'employee_code' => 201,
                'admin_flg' => false,
                'retire_flg' => false,
            ],
            // ユーザー02
            [
                'name' => 'user02',
                'password' => Hash::make('secret'),
                'employee_code' => 202,
                'admin_flg' => false,
                'retire_flg' => false,
            ],
            // ユーザー99 (退職者)
            [
                'name' => 'user99',
                'password' => Hash::make('secret'),
                'employee_code' => 299,
                'admin_flg' => false,
                'retire_flg' => true,
            ],
        ];

        foreach ($seeds as $seed) {
            factory(User::class)->create($seed);
        }

        factory(User::class, 20)->create();
    }
}
