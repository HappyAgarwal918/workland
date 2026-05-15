<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price_yearly', 10, 2);
            $table->unsignedInteger('max_branches')->nullable();    // null = unlimited
            $table->unsignedInteger('max_bookings_per_month')->nullable(); // null = unlimited
            $table->json('features');          // display list of feature strings
            $table->boolean('is_featured')->default(false);
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
