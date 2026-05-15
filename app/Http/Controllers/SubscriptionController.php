<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $active = Subscription::with('plan')
            ->where('employer_id', $user->id)
            ->where('status', 'active')
            ->where('ends_at', '>=', now())
            ->latest()
            ->first();

        $plans = SubscriptionPlan::orderBy('sort_order')->get();

        $view = $request->attributes->get('isMobile')
            ? 'mobile-first.employer.subscription'
            : 'desktop.employer.subscription';

        return view($view, compact('active', 'plans'));
    }

    public function subscribe(Request $request)
    {
        $request->validate(['plan_id' => 'required|exists:subscription_plans,id']);

        $user  = auth()->user();
        $plan  = SubscriptionPlan::findOrFail($request->plan_id);

        // Cancel any existing active subscription first
        Subscription::where('employer_id', $user->id)
            ->where('status', 'active')
            ->update(['status' => 'cancelled', 'cancelled_at' => now()]);

        Subscription::create([
            'employer_id' => $user->id,
            'plan_id'     => $plan->id,
            'status'      => 'active',
            'amount_paid' => $plan->price_yearly,
            'starts_at'   => now(),
            'ends_at'     => now()->addYear(),
        ]);

        return redirect()->route('employer.subscription')
            ->with('success', "You are now subscribed to the {$plan->name} plan. Valid for 1 year.");
    }

    public function cancel(Request $request)
    {
        $user = auth()->user();

        Subscription::where('employer_id', $user->id)
            ->where('status', 'active')
            ->update(['status' => 'cancelled', 'cancelled_at' => now()]);

        return redirect()->route('employer.subscription')
            ->with('success', 'Your subscription has been cancelled.');
    }
}
