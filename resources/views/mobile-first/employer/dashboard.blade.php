@extends('layouts.mobile-employer')

@section('title', 'Workland - Employer Dashboard')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="row g-3">
  <div class="col-6">
    <div class="stat-card text-center p-3 border rounded">
      <div class="stat-number fw-bold fs-3">10</div>
      <div class="stat-title text-muted small">Upcoming Tours</div>
    </div>
  </div>
  <div class="col-6">
    <div class="stat-card text-center p-3 border rounded">
      <div class="stat-number fw-bold fs-3">15</div>
      <div class="stat-title text-muted small">Outgoing Tours</div>
    </div>
  </div>
  <div class="col-6">
    <div class="stat-card text-center p-3 border rounded">
      <div class="stat-number fw-bold fs-3">30</div>
      <div class="stat-title text-muted small">Guide Requests</div>
    </div>
  </div>
  <div class="col-6">
    <div class="stat-card text-center p-3 border rounded">
      <div class="stat-number fw-bold fs-3">5</div>
      <div class="stat-title text-muted small">Branches</div>
    </div>
  </div>
</div>

<div class="mt-4">
  <h6 class="fw-bold mb-3">Quick Actions</h6>
  <div class="d-grid gap-2">
    <a href="{{ route('employer.search-guide') }}" class="btn btn-primary">Search Guide</a>
    <a href="{{ route('employer.upcoming-booking') }}" class="btn btn-outline-primary">Upcoming Tours</a>
    <a href="{{ route('employer.add-branches') }}" class="btn btn-outline-secondary">Manage Branches</a>
  </div>
</div>

@endsection
