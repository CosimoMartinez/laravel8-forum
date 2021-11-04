<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            'user_id' => 1,
            'title' => 'Test topic',
            'content' => 'Lorem ipsum dolor sit amet',
            'created_at' => Carbon::now()
        ]);
    }
}