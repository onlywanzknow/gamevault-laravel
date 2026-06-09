<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedBigInteger('rawg_game_id');
            $table->string('game_name');
            $table->string('game_slug')->nullable();
            $table->string('game_image')->nullable();
            $table->decimal('game_rating', 3, 1)->nullable();
            $table->date('game_released')->nullable();

            $table->string('status')->default('Ingin dimainkan');

            $table->timestamps();

            $table->unique(['user_id', 'rawg_game_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};