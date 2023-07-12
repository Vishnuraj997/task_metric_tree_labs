<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('user_profile_id')->unsigned();
            $table->bigInteger('notes_id')->nullable();
            $table->string('note_text')->nullable();
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('user_id')
            ->references('id')->on('users');
            });
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('user_profile_id')
            ->references('id')->on('users_profile');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
