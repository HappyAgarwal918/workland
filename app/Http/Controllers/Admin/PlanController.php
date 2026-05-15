<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::withCount([
            'subscriptions as active_count' => fn($q) => $q->where('status', 'active'),
        ])->orderBy('sort_order')->get();

        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                   => 'required|string|max:100',
            'price_yearly'           => 'required|numeric|min:0',
            'max_branches'           => 'nullable|integer|min:1',
            'max_bookings_per_month' => 'nullable|integer|min:1',
            'features'               => 'nullable|array',
            'features.*'             => 'string|max:200',
            'is_featured'            => 'nullable|boolean',
            'sort_order'             => 'nullable|integer|min:0',
        ]);

        $data['slug']        = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['features']    = array_values(array_filter($request->input('features', [])));
        $data['sort_order']  = $data['sort_order'] ?? 0;

        SubscriptionPlan::create($data);

        return redirect()->route('admin.plans.index')
            ->with('success', "Plan \"{$data['name']}\" created.");
    }

    public function edit(SubscriptionPlan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, SubscriptionPlan $plan)
    {
        $data = $request->validate([
            'name'                   => 'required|string|max:100',
            'price_yearly'           => 'required|numeric|min:0',
            'max_branches'           => 'nullable|integer|min:1',
            'max_bookings_per_month' => 'nullable|integer|min:1',
            'features'               => 'nullable|array',
            'features.*'             => 'string|max:200',
            'is_featured'            => 'nullable|boolean',
            'sort_order'             => 'nullable|integer|min:0',
        ]);

        $data['slug']        = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['features']    = array_values(array_filter($request->input('features', [])));
        $data['sort_order']  = $data['sort_order'] ?? $plan->sort_order;

        $plan->update($data);

        return redirect()->route('admin.plans.index')
            ->with('success', "Plan \"{$plan->name}\" updated.");
    }

    public function destroy(SubscriptionPlan $plan)
    {
        $activeCount = $plan->subscriptions()->where('status', 'active')->count();

        if ($activeCount > 0) {
            return back()->with('error', "Cannot delete — {$activeCount} employer(s) are on this plan.");
        }

        $plan->delete();

        return redirect()->route('admin.plans.index')
            ->with('success', 'Plan deleted.');
    }
}
