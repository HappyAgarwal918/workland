<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name', 'slug', 'price_yearly',
        'max_branches', 'max_bookings_per_month',
        'features', 'is_featured', 'sort_order',
    ];

    protected $casts = [
        'features'   => 'array',
        'is_featured' => 'boolean',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }

    public function formattedPrice(): string
    {
        return 'ISK ' . number_format($this->price_yearly, 0, '.', ',');
    }
}
