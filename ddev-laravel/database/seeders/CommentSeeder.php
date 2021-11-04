<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'topic_id' => 1,
            'user_id' => 1,
            'content' => 'test commento 1 utente 1',
            'created_at' => Carbon::now()
        ]);
        DB::table('comments')->insert([
            'topic_id' => 1,
            'user_id' => 1,
            'content' => 'test commento 2 utente 1',
            'created_at' => Carbon::now()
        ]);
    }
}