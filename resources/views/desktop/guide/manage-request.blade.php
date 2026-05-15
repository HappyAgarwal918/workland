@extends('layouts.guide-dashboard')

@section('title', 'Workland - Manage Request')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header mb-4">
    <h1>Manage Request</h1>
  </div>

  <div class="row g-4">
    @for($i = 0; $i < 6; $i++)
    <div class="col-lg-12">
      <div class="guide-card booking-grid p-4 border rounded">
        <div class="row align-items-center">
          <div class="col-md-2">
            <img src="{{ asset('assets/dashboard/img/user-' . (($i % 3) + 1) . '.jpg') }}" class="rounded-circle" style="width:60px;height:60px;object-fit:cover;" alt="Employer">
          </div>
          <div class="col-md-3">
            <h6 class="mb-1">Adventure Iceland Co.</h6>
            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Reykjavik, Iceland</small>
          </div>
          <div class="col-md-2">
            <small class="text-muted">Date</small>
            <p class="mb-0 fw-bold">06 Aug 2025</p>
          </div>
          <div class="col-md-2">
            <small class="text-muted">Duration</small>
            <p class="mb-0 fw-bold">5 Days</p>
          </div>
          <div class="col-md-3 text-end">
            <a href="{{ route('guide.manage-request-view') }}" class="btn btn-sm btn-outline-primary me-1">View</a>
            <a href="#" class="btn btn-sm btn-success me-1">Accept</a>
            <a href="#" class="btn btn-sm btn-danger">Decline</a>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@endsection
