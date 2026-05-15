<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('guide_id')->constrained('users')->cascadeOnDelete();
            $table->tinyInteger('rating'); // 1–5
            $table->text('comment')->nullable();
            $table->timestamps();

            // One review per completed booking
            $table->unique('booking_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
