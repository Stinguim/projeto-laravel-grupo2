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
        Schema::table('cleaning', function (Blueprint $table) {
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
        Schema::table('cleaning', function (Blueprint $table) {
            $table->dropForeign('cleaning_cleaning_team_id_foreign');
            $table->dropColumn('cleaning_team_id');
        });
    }
};
