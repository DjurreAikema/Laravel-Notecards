<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'done',
        ]);
        DB::table('statuses')->insert([
            'status' => 'active',
        ]);
        DB::table('statuses')->insert([
            'status' => 'waiting',
        ]);
    }
}
