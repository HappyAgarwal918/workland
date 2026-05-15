<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('guide_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('USD');
            $table->string('payment_method')->nullable(); // e.g. stripe, paypal, cash
            $table->string('transaction_id')->nullable()->unique();
            $table->enum('status', [
                'pending',
                'completed',
                'failed',
                'refunded',
            ])->default('pending');
            $table->json('gateway_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
