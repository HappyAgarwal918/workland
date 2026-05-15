@extends('layouts.admin')
@section('title', 'Manage Plans')
@section('page-title', 'Subscription Plans')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">{{ $plans->count() }} plan(s) total</p>
  <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">
    <i class="fa fa-plus me-1"></i> New Plan
  </a>
</div>

<div class="bg-white rounded shadow-sm overflow-hidden">
  <table class="table table-hover mb-0">
    <thead class="table-light">
      <tr>
        <th>Plan</th>
        <th>Price / yr</th>
        <th>Branches</th>
        <th>Bookings / mo</th>
        <th>Active Subscribers</th>
        <th>Featured</th>
        <th>Order</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse($plans as $plan)
        <tr>
          <td>
            <span class="fw-semibold">{{ $plan->name }}</span>
            <br><small class="text-muted">{{ $plan->slug }}</small>
          </td>
          <td>ISK {{ number_format($plan->price_yearly, 0, '.', ',') }}</td>
          <td>{{ $plan->max_branches ?? '<span class="text-muted">∞</span>' }}</td>
          <td>{{ $plan->max_bookings_per_month ?? '<span class="text-muted">∞</span>' }}</td>
          <td>
            <span class="badge bg-{{ $plan->active_count > 0 ? 'success' : 'secondary' }}">
              {{ $plan->active_count }}
            </span>
          </td>
          <td>
            @if($plan->is_featured)
              <span class="badge bg-primary">Yes</span>
            @else
              <span class="text-muted">—</span>
            @endif
          </td>
          <td>{{ $plan->sort_order }}</td>
          <td class="text-end">
            <a href="{{ route('admin.plans.edit', $plan) }}" class="btn btn-sm btn-outline-secondary me-1">
              <i class="fa fa-pen"></i>
            </a>
            <form method="POST" action="{{ route('admin.plans.destroy', $plan) }}" class="d-inline"
                  onsubmit="return confirm('Delete this plan?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="8" class="text-center text-muted py-4">No plans yet. <a href="{{ route('admin.plans.create') }}">Create one.</a></td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
