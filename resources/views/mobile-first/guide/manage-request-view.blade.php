@extends('layouts.mobile-guide')

@section('title', 'Workland - Request Details')
@section('page-title', 'Request Details')

@section('content')

<div class="mb-3">
  <a href="{{ route('guide.manage-request') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
</div>

<div class="border rounded p-3 mb-3">
  <h6 class="fw-bold mb-3">Employer Information</h6>
  <div class="d-flex align-items-center mb-2">
    <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="rounded-circle me-3" style="width:50px;height:50px;object-fit:cover;" alt="">
    <div>
      <h6 class="mb-0">Adventure Iceland Co.</h6>
      <small class="text-muted">Reykjavik, Iceland</small>
    </div>
  </div>
</div>

<div class="border rounded p-3 mb-3">
  <h6 class="fw-bold mb-3">Tour Details</h6>
  <div class="row g-2">
    <div class="col-6"><small class="text-muted">Start Date</small><p class="fw-bold">06 Aug 2025</p></div>
    <div class="col-6"><small class="text-muted">End Date</small><p class="fw-bold">11 Aug 2025</p></div>
    <div class="col-6"><small class="text-muted">Location</small><p class="fw-bold">Reykjavik</p></div>
    <div class="col-6"><small class="text-muted">Activity</small><p class="fw-bold">Glacier Tour</p></div>
    <div class="col-6"><small class="text-muted">Adults</small><p class="fw-bold">12</p></div>
    <div class="col-6"><small class="text-muted">Kids</small><p class="fw-bold">3</p></div>
  </div>
</div>

<div class="d-grid gap-2">
  <button class="btn-frm-all">Accept Request</button>
  <a href="#" class="btn btn-outline-danger">Decline Request</a>
</div>

@endsection
