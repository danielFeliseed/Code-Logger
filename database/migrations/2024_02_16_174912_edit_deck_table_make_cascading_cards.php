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
            // Drop the existing foreign key constraint if it exists
            // You might need to do this in a separate step or check if the constraint exists
            $table->dropForeign('cards_deck_id_foreign'); // Only if you're sure it needs to be removed
        
            // Add the foreign key constraint with a custom name
            $table->foreign('deck_id', 'custom_cards_deck_id_foreign')
                  ->references('id')
                  ->on('decks')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign('custom_cards_deck_id_foreign'); // Use the custom name if you specified one
        });
    }
};
