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
        DB::table('users')->insert([
            'name' => "Cosimo Martinez",
            'email' => 'cosimomartinez@laravelforum.com',
            'password' => Hash::make('password1'),
        ]);
        DB::table('users')->insert([
            'name' => "Mario Rossi",
            'email' => 'mariorossi@laravelforum.com',
            'password' => Hash::make('password2'),
        ]);
    }
}
