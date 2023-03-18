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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favorite_user_id');
            $table->unsignedBigInteger('favorited_user_id');
            $table->timestamps();

            $table->foreign('favorite_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('favorited_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['favorite_user_id', 'favorited_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
