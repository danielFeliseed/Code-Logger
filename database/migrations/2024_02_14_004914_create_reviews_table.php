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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('card_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('easiness')->default(250);
            $table->integer('interval')->default(1);
            $table->integer('repetitions')->default(0);
            $table->integer('quality')->default(0);
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('again_at')->nullable();
            $table->timestamp('hard_at')->nullable();
            $table->timestamp('good_at')->nullable();
            $table->timestamp('easy_at')->nullable();
            $table->timestamp('forgotten_at')->nullable();
            $table->timestamp('remembered_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
