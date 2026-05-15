<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'employer_id', 'plan_id', 'status',
        'amount_paid', 'starts_at', 'ends_at', 'cancelled_at',
    ];

    protected $casts = [
        'starts_at'    => 'date',
        'ends_at'      => 'date',
        'cancelled_at' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function isActive(): bool
    {
        return $this->status === 'active' && $this->ends_at->isFuture();
    }

    public function daysRemaining(): int
    {
        return max(0, now()->diffInDays($this->ends_at, false));
    }
}
