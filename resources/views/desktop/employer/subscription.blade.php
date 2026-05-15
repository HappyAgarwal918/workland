@extends('layouts.employer-dashboard')
@section('title', 'Workland - Subscription')
@section('page-title', 'Subscription')

@section('styles')
<style>
.plan-card { border: 2px solid #dee2e6; border-radius: 12px; transition: border-color .2s, box-shadow .2s; height: 100%; }
.plan-card:hover { border-color: #0d6efd; box-shadow: 0 4px 20px rgba(13,110,253,.12); }
.plan-card.featured { border-color: #0d6efd; }
.plan-price { font-size: 2rem; font-weight: 700; color: #0d6efd; }
.plan-price small { font-size: 1rem; font-weight: 400; color: #6c757d; }
.feature-list { list-style: none; padding: 0; margin: 0; }
.feature-list li { padding: 6px 0; border-bottom: 1px solid #f0f0f0; font-size: .92rem; }
.feature-list li:last-child { border-bottom: none; }
.feature-list li::before { content: '✓ '; color: #198754; font-weight: 700; }
.status-badge { font-size: .8rem; padding: 4px 12px; border-radius: 20px; }
.current-plan-banner { background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%); border-radius: 12px; color: #fff; }
</style>
@endsection

@section('content')

{{-- Flash messages --}}
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

{{-- Current subscription status --}}
@if($active)
  <div class="current-plan-banner p-4 mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div>
      <p class="mb-1 opacity-75 small text-uppercase fw-semibold">Active Plan</p>
      <h4 class="mb-1 fw-bold">{{ $active->plan->name }}</h4>
      <p class="mb-0 opacity-90">
        Expires on <strong>{{ $active->ends_at->format('d M Y') }}</strong>
        &mdash; <strong>{{ $active->daysRemaining() }}</strong> days remaining
      </p>
    </div>
    <div class="text-end">
      <p class="mb-1 opacity-75 small">Amount paid</p>
      <p class="mb-2 fw-bold fs-5">{{ $active->plan->formattedPrice() }}/yr</p>
      <form method="POST" action="{{ route('employer.subscription.cancel') }}"
            onsubmit="return confirm('Are you sure you want to cancel your subscription?')">
        @csrf
        <button type="submit" class="btn btn-sm btn-light text-danger fw-semibold">
          Cancel Subscription
        </button>
      </form>
    </div>
  </div>
@else
  <div class="alert alert-warning mb-4">
    <i class="fa fa-info-circle me-2"></i>
    You don't have an active subscription. Choose a plan below to get started.
  </div>
@endif

{{-- Plans --}}
<h5 class="fw-semibold mb-3">{{ $active ? 'Switch Plan' : 'Choose a Plan' }}</h5>
<div class="row g-4">
  @foreach($plans as $plan)
    @php $isCurrent = $active && $active->plan_id === $plan->id; @endphp
    <div class="col-md-6">
      <div class="plan-card p-4 d-flex flex-column {{ $plan->is_featured ? 'featured' : '' }}">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-start mb-3">
          <div>
            @if($plan->is_featured)
              <span class="badge bg-primary mb-1">Most Popular</span><br>
            @endif
            <h5 class="fw-bold mb-0">{{ $plan->name }}</h5>
          </div>
          @if($isCurrent)
            <span class="status-badge bg-success text-white">Current Plan</span>
          @endif
        </div>

        {{-- Price --}}
        <p class="plan-price mb-1">
          {{ $plan->formattedPrice() }}
          <small>/year</small>
        </p>
        <p class="text-muted small mb-3">Annual billing &mdash; billed once per year</p>

        {{-- Limits --}}
        <div class="d-flex gap-3 mb-3">
          <div class="text-center px-3 py-2 bg-light rounded">
            <div class="fw-bold">{{ $plan->max_branches ?? '∞' }}</div>
            <div class="text-muted" style="font-size:.78rem;">Branches</div>
          </div>
          <div class="text-center px-3 py-2 bg-light rounded">
            <div class="fw-bold">{{ $plan->max_bookings_per_month ?? '∞' }}</div>
            <div class="text-muted" style="font-size:.78rem;">Bookings/mo</div>
          </div>
        </div>

        {{-- Features --}}
        <ul class="feature-list flex-grow-1 mb-4">
          @foreach($plan->features as $feature)
            <li>{{ $feature }}</li>
          @endforeach
        </ul>

        {{-- CTA --}}
        @if($isCurrent)
          <button class="btn btn-outline-success w-100" disabled>
            <i class="fa fa-check me-1"></i> Active Plan
          </button>
        @else
          <button class="btn {{ $plan->is_featured ? 'btn-primary' : 'btn-outline-primary' }} w-100"
                  data-bs-toggle="modal"
                  data-bs-target="#confirmModal"
                  data-plan-id="{{ $plan->id }}"
                  data-plan-name="{{ $plan->name }}"
                  data-plan-price="{{ $plan->formattedPrice() }}">
            {{ $active ? 'Switch to This Plan' : 'Subscribe Now' }}
          </button>
        @endif

      </div>
    </div>
  @endforeach
</div>

{{-- Confirm modal --}}
<div class="modal fade" id="confirmModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold">Confirm Subscription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2">
        <p>You are about to subscribe to:</p>
        <div class="bg-light rounded p-3 mb-3">
          <h6 class="fw-bold mb-1" id="modalPlanName"></h6>
          <p class="mb-0 text-primary fw-semibold" id="modalPlanPrice"></p>
          <small class="text-muted">Billed annually &mdash; valid for 1 year from today</small>
        </div>
        @if($active)
          <div class="alert alert-warning small py-2">
            <i class="fa fa-info-circle me-1"></i>
            Your current plan will be cancelled immediately and replaced with the new one.
          </div>
        @endif
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Go Back</button>
        <form method="POST" action="{{ route('employer.subscription.subscribe') }}" id="subscribeForm">
          @csrf
          <input type="hidden" name="plan_id" id="modalPlanId">
          <button type="submit" class="btn btn-primary px-4">Confirm & Subscribe</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById('confirmModal').addEventListener('show.bs.modal', function (e) {
  const btn = e.relatedTarget;
  document.getElementById('modalPlanId').value    = btn.dataset.planId;
  document.getElementById('modalPlanName').textContent  = btn.dataset.planName;
  document.getElementById('modalPlanPrice').textContent = btn.dataset.planPrice + ' / year';
});
</script>
@endsection
