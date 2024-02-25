<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Deck;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Scheme::dropIfExists('cards');

        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('front');
            $table->text('back')->nullable();
            $table->foreignId('deck_id')->constrained();
            $table->integer('position')->default(0);
            $table->softDeletes();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decks');
        Schema::dropIfExists('cards');
    }
};
