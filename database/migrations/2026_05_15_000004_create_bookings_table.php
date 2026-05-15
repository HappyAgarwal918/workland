<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('guide_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->unsignedSmallInteger('duration_days')->default(1);
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
                'cancelled',
                'completed',
            ])->default('pending');
            $table->text('employer_notes')->nullable();
            $table->text('guide_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
