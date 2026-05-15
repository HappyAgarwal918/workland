<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name'                  => 'Single-Base Operator',
                'slug'                  => 'single-base',
                'price_yearly'          => 14900.00,
                'max_branches'          => 1,
                'max_bookings_per_month' => 15,
                'features'              => [
                    '1 operational base',
                    'Up to 15 guide bookings per month',
                    'Guide search & filtering',
                    'Messaging with guides',
                    'Booking management',
                    'Payment history',
                    'Email support',
                ],
                'is_featured'  => false,
                'sort_order'   => 1,
            ],
            [
                'name'                  => 'Multiple-Base Operator',
                'slug'                  => 'multi-base',
                'price_yearly'          => 24900.00,
                'max_branches'          => null,
                'max_bookings_per_month' => null,
                'features'              => [
                    'Unlimited operational bases',
                    'Unlimited guide bookings',
                    'Guide search & filtering',
                    'Messaging with guides',
                    'Booking management',
                    'Payment history',
                    'Priority support',
                    'Advanced analytics',
                ],
                'is_featured'  => true,
                'sort_order'   => 2,
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::updateOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
