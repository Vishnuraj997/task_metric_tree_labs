<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\UserProfile;
class UserSeeder extends Seeder
{
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        UserProfile::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            [
                'email' => 'abc@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'email' => 'defg@gmail.com',
                'password' => bcrypt('password456'),
            ],
        ]);
    }
}
