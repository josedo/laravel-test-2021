<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'user_id' => '1',
            'name' => 'admins',
            'personal_team' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('teams')->insert([
            'user_id' => '1',
            'name' => 'developers',
            'personal_team' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
