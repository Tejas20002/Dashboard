<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'email'=>'root@sudo.com',
                'name'=>'root',
                'password'=>Hash::make('Apstndp@20'),
                'isAdmin'=>1
            ],
        ];
        DB::table('users')->insert($user);
    }
}
