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
        Schema::table('cleaning_request', function (Blueprint $table) {
            $table->foreignId('lodging_id')
                ->references('id_lodging')
                ->on('lodging');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cleaning_request', function (Blueprint $table) {
            $table->dropForeign('cleaning_request_lodging_id_foreign');
            $table->dropColumn('lodging_id');

        });
    }
};
