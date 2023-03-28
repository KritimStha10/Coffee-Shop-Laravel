<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kritim',
            'email' => 'kritimstha2015@gmail.com',
            'password' => bcrypt('kritim123'),
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);
    }
}
