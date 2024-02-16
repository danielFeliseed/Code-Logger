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
        Schema::table('cards', function (Blueprint $table) {
           
            if (!Schema::hasColumn('cards', 'deck_id')) {
                $table->foreignId('deck_id')->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            
            if (Schema::hasColumn('cards', 'deck_id')) {
                $table->dropForeign(['deck_id']); // Drop foreign key constraint
                $table->dropColumn('deck_id'); // Drop the column
            }
        });
    }
};
