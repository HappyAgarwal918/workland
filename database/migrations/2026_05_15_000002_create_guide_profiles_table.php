<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guide_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone', 20)->nullable();
            $table->string('profile_photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->unsignedSmallInteger('experience_years')->default(0);
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->decimal('daily_rate', 10, 2)->nullable();
            $table->json('languages')->nullable();       // e.g. ["English","French"]
            $table->json('specializations')->nullable(); // e.g. ["Trekking","Wildlife"]
            $table->json('availability')->nullable();    // e.g. {"mon":true,"tue":false,...}
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->unsignedInteger('total_reviews')->default(0);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guide_profiles');
    }
};
