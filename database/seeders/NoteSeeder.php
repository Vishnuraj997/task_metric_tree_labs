<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Note;


class NoteSeeder extends Seeder
{
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Note::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('notes')->insert([
            [
                'user_id' => 1,
                'user_profile_id' => 1,
                'notes_id' => 1,
                'note_text' => "Today is my Bday",
            ],

            [
                'user_id' => 1,
                'user_profile_id' => 1,
                'notes_id' => 2,
                'note_text' => "Hi Guys",
            ],


            [
                'user_id' => 1,
                'user_profile_id' => 1,
                'notes_id' => 3,
                'note_text' => "Better days are coming",
            ],

            [
                'user_id' => 2,
                'user_profile_id' => 2,
                'notes_id' => 4,
                'note_text' => "Youre the best",
            ],

            [
                'user_id' => 2,
                'user_profile_id' => 2,
                'notes_id' => 5,
                'note_text' => "blah blah blah",
            ],
        
        ]);
    }
}
