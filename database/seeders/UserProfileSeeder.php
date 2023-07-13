<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\UserProfile;


class UserProfileSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        UserProfile::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users_profile')->insert([
            [
                'first_name' => 'abc',
                'last_name' => 'def',
                'address' => 'abcd',
            ],

            [
                'first_name' => 'vishnu',
                'last_name' => 'rajt',
                'address' => 'nothing',
            ],

        ]);
    }
}
