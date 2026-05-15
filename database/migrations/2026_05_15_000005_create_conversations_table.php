<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('guide_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete();
            $table->timestamp('last_message_at')->nullable();
            $table->timestamps();

            // One conversation thread per employer-guide pair
            $table->unique(['employer_id', 'guide_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
