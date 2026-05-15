<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'employers'     => User::where('role', 'employer')->count(),
            'guides'        => User::where('role', 'guide')->count(),
            'plans'         => SubscriptionPlan::count(),
            'subscriptions' => Subscription::where('status', 'active')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
