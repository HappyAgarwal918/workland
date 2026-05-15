@extends('layouts.guide-dashboard')

@section('title', 'Workland - Request Details')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header mb-4">
    <h1>Request Details</h1>
    <a href="{{ route('guide.manage-request') }}" class="btn btn-outline-secondary btn-sm">← Back to Requests</a>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card p-4 border rounded mb-4">
        <h5 class="mb-3">Employer Information</h5>
        <div class="d-flex align-items-center mb-3">
          <img src="{{ asset('assets/dashboard/img/user-1.jpg') }}" class="rounded-circle me-3" style="width:60px;height:60px;object-fit:cover;" alt="">
          <div>
            <h6 class="mb-0">Adventure Iceland Co.</h6>
            <small class="text-muted">Reykjavik, Iceland</small>
          </div>
        </div>
        <div class="row g-2">
          <div class="col-6"><small class="text-muted">Company Size</small><p class="fw-bold">15-50 employees</p></div>
          <div class="col-6"><small class="text-muted">Languages</small><p class="fw-bold">English, Icelandic</p></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-4 border rounded mb-4">
        <h5 class="mb-3">Tour Details</h5>
        <div class="row g-2">
          <div class="col-6"><small class="text-muted">Start Date</small><p class="fw-bold">06 Aug 2025</p></div>
          <div class="col-6"><small class="text-muted">End Date</small><p class="fw-bold">11 Aug 2025</p></div>
          <div class="col-6"><small class="text-muted">Location</small><p class="fw-bold">Reykjavik, Iceland</p></div>
          <div class="col-6"><small class="text-muted">Activity</small><p class="fw-bold">Glacier Tour</p></div>
          <div class="col-6"><small class="text-muted">No. of Adults</small><p class="fw-bold">12</p></div>
          <div class="col-6"><small class="text-muted">No. of Kids</small><p class="fw-bold">3</p></div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="d-flex gap-3">
        <button class="btn btn-success btn-lg">Accept Request</button>
        <button class="btn btn-danger btn-lg">Decline Request</button>
      </div>
    </div>
  </div>
</div>

@endsection
