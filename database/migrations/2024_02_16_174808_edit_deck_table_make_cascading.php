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
        Schema::table('decks', function (Blueprint $table) {
            if (!Schema::hasColumn('decks', 'user_id')) {
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('decks', function (Blueprint $table) {
            if (Schema::hasColumn('decks', 'user_id')) {
                $table->dropForeign(['user_id']); // Drop foreign key constraint
                $table->dropColumn('user_id'); // Drop the column
            }
        });
    }
};
