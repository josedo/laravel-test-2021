<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_user')->insert([
            'team_id' => '2',
            'user_id' => '2',
            'role' => 'editor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
