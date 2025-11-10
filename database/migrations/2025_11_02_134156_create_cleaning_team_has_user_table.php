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
        Schema::create('cleaning_team_has_user', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->references('id_user')
                ->on('user');
            $table->foreignId('cleaning_team_id')
                ->references('id_cleaning_team')
                ->on('cleaning_team');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleaning_team_has_user');
    }
};
