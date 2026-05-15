@extends('layouts.mobile-employer')
@section('title', 'Workland - Subscription')
@section('page-title', 'Subscription')

@section('styles')
<style>
.plan-card { border: 2px solid #dee2e6; border-radius: 12px; transition: border-color .2s; }
.plan-card.featured { border-color: #0d6efd; }
.plan-price { font-size: 1.7rem; font-weight: 700; color: #0d6efd; }
.feature-list { list-style: none; padding: 0; margin: 0; }
.feature-list li { padding: 5px 0; border-bottom: 1px solid #f0f0f0; font-size: .88rem; }
.feature-list li:last-child { border-bottom: none; }
.feature-list li::before { content: '✓ '; color: #198754; font-weight: 700; }
.current-banner { background: linear-gradient(135deg, #0d6efd, #0056b3); border-radius: 12px; color: #fff; }
</style>
@endsection

@section('content')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

{{-- Current subscription --}}
@if($active)
  <div class="current-banner p-3 mb-4">
    <p class="mb-1 opacity-75 small text-uppercase fw-semibold">Active Plan</p>
    <h5 class="fw-bold mb-1">{{ $active->plan->name }}</h5>
    <p class="mb-2 opacity-90 small">
      Expires <strong>{{ $active->ends_at->format('d M Y') }}</strong>
      &mdash; {{ $active->daysRemaining() }} days left
    </p>
    <p class="fw-bold mb-2">{{ $active->plan->formattedPrice() }}/yr</p>
    <form method="POST" action="{{ route('employer.subscription.cancel') }}"
          onsubmit="return confirm('Cancel your subscription?')">
      @csrf
      <button type="submit" class="btn btn-sm btn-light text-danger w-100">Cancel Subscription</button>
    </form>
  </div>
@else
  <div class="alert alert-warning mb-3 small">
    <i class="fa fa-info-circle me-1"></i>
    No active subscription. Pick a plan below.
  </div>
@endif

{{-- Plans --}}
<h6 class="fw-semibold mb-3">{{ $active ? 'Switch Plan' : 'Choose a Plan' }}</h6>

@foreach($plans as $plan)
  @php $isCurrent = $active && $active->plan_id === $plan->id; @endphp
  <div class="plan-card p-3 mb-3 {{ $plan->is_featured ? 'featured' : '' }}">
    <div class="d-flex justify-content-between align-items-start mb-2">
      <div>
        @if($plan->is_featured)
          <span class="badge bg-primary mb-1">Most Popular</span><br>
        @endif
        <h6 class="fw-bold mb-0">{{ $plan->name }}</h6>
      </div>
      @if($isCurrent)
        <span class="badge bg-success">Current</span>
      @endif
    </div>

    <p class="plan-price mb-0">{{ $plan->formattedPrice() }}<small class="fs-6 text-muted fw-normal">/yr</small></p>
    <p class="text-muted mb-2" style="font-size:.78rem;">Annual billing</p>

    <div class="d-flex gap-2 mb-3">
      <span class="badge bg-light text-dark border">
        {{ $plan->max_branches ?? '∞' }} branch{{ ($plan->max_branches === 1) ? '' : 'es' }}
      </span>
      <span class="badge bg-light text-dark border">
        {{ $plan->max_bookings_per_month ?? '∞' }} bookings/mo
      </span>
    </div>

    <ul class="feature-list mb-3">
      @foreach($plan->features as $feature)
        <li>{{ $feature }}</li>
      @endforeach
    </ul>

    @if($isCurrent)
      <button class="btn btn-outline-success w-100 btn-sm" disabled>
        <i class="fa fa-check me-1"></i> Active Plan
      </button>
    @else
      <button class="btn {{ $plan->is_featured ? 'btn-primary' : 'btn-outline-primary' }} w-100 btn-sm"
              data-bs-toggle="modal"
              data-bs-target="#confirmModal"
              data-plan-id="{{ $plan->id }}"
              data-plan-name="{{ $plan->name }}"
              data-plan-price="{{ $plan->formattedPrice() }}">
        {{ $active ? 'Switch to This Plan' : 'Subscribe Now' }}
      </button>
    @endif
  </div>
@endforeach

{{-- Confirm modal --}}
<div class="modal fade" id="confirmModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">Confirm Subscription</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-1">
        <div class="bg-light rounded p-3 mb-2">
          <p class="fw-semibold mb-0" id="modalPlanName"></p>
          <p class="text-primary fw-bold mb-0" id="modalPlanPrice"></p>
          <small class="text-muted">Valid for 1 year from today</small>
        </div>
        @if($active)
          <p class="small text-warning mb-0">
            <i class="fa fa-info-circle me-1"></i>Current plan will be replaced.
          </p>
        @endif
      </div>
      <div class="modal-footer border-0 pt-0 flex-column gap-2">
        <form method="POST" action="{{ route('employer.subscription.subscribe') }}" class="w-100" id="subscribeForm">
          @csrf
          <input type="hidden" name="plan_id" id="modalPlanId">
          <button type="submit" class="btn btn-primary w-100">Confirm & Subscribe</button>
        </form>
        <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">Go Back</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById('confirmModal').addEventListener('show.bs.modal', function (e) {
  const btn = e.relatedTarget;
  document.getElementById('modalPlanId').value         = btn.dataset.planId;
  document.getElementById('modalPlanName').textContent = btn.dataset.planName;
  document.getElementById('modalPlanPrice').textContent = btn.dataset.planPrice + ' / year';
});
</script>
@endsection
