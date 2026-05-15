@extends('layouts.mobile-guide')

@section('title', 'Workland - Travel Details')
@section('page-title', 'Travel Details')

@section('content')

<div class="mb-3">
  <a href="{{ route('guide.upcoming-tour-request') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
</div>

<div class="border rounded p-3 mb-3">
  <img src="{{ asset('mobile/dashboard/img/branch.png') }}" class="img-fluid rounded mb-3" alt="Location">
  <h5 class="fw-bold">Reykjavik, Iceland</h5>
  <div class="row g-2">
    <div class="col-6"><small class="text-muted">Employer</small><p class="fw-bold">Adventure Iceland Co.</p></div>
    <div class="col-6"><small class="text-muted">Activity</small><p class="fw-bold">Glacier Tour</p></div>
    <div class="col-6"><small class="text-muted">Start Date</small><p class="fw-bold">06 Aug 2025</p></div>
    <div class="col-6"><small class="text-muted">End Date</small><p class="fw-bold">11 Aug 2025</p></div>
    <div class="col-6"><small class="text-muted">Adults</small><p class="fw-bold">12</p></div>
    <div class="col-6"><small class="text-muted">Kids</small><p class="fw-bold">3</p></div>
    <div class="col-12"><small class="text-muted">Notes</small><p class="fw-bold">Please bring glacier equipment and warm clothing.</p></div>
  </div>
</div>

<div class="d-grid gap-2">
  <a href="{{ route('map') }}" target="_blank" class="btn btn-outline-info">View on Map</a>
</div>

@endsection
