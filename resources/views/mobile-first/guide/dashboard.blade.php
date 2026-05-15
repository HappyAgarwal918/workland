@extends('layouts.mobile-guide')

@section('title', 'Workland - Guide Dashboard')
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
  <div class="col-12">
    <div class="stat-card text-center p-3 border rounded">
      <div class="stat-number fw-bold fs-3">5</div>
      <div class="stat-title text-muted small">Pending Requests</div>
    </div>
  </div>
</div>

<div class="mt-4">
  <h6 class="fw-bold mb-3">Quick Actions</h6>
  <div class="d-grid gap-2">
    <a href="{{ route('guide.manage-request') }}" class="btn btn-primary">Manage Requests</a>
    <a href="{{ route('guide.upcoming-tour-request') }}" class="btn btn-outline-primary">Upcoming Tours</a>
    <a href="{{ route('guide.calendar') }}" class="btn btn-outline-secondary">My Calendar</a>
  </div>
</div>

<div class="checkout-btn-map mt-4 text-center">
  <a href="{{ route('map') }}" target="_blank" class="btn btn-outline-info">Checkout the Map</a>
</div>

@endsection
