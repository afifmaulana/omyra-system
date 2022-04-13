<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@omyraglobal.com',
                'role' => 0,
                'password' => app('hash')->make('password')
            ],
            [
                'name' => 'Sumiyati',
                'email' => 'sumi@omyraglobal.com',
                'role' => 1,
                'password' => app('hash')->make('password')
            ],
            [
                'name' => 'Oppie Kumis',
                'email' => 'opi@omyraglobal.com',
                'role' => 2,
                'password' => app('hash')->make('password')
            ],
        ];
        DB::table('users')->insert($users);
    }
}
