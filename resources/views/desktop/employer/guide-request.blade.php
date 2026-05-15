@extends('layouts.employer-dashboard')

@section('title', 'Workland - Guide Request')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header">
    <h1>Guide Request</h1>
  </div>

  <div class="row g-4">
    @for($i = 0; $i < 6; $i++)
    <div class="col-lg-12">
      <div class="guide-card booking-grid">
        <div class="row align-items-center">
          <div class="col-md-2">
            <img src="{{ asset('assets/dashboard/img/user-' . (($i % 3) + 1) . '.jpg') }}" class="guide-img-sm rounded-circle" alt="Guide">
          </div>
          <div class="col-md-3">
            <h5 class="guide-name mb-1">Mahima Goyal</h5>
            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Reykjavik, Iceland</small>
          </div>
          <div class="col-md-3">
            <small class="text-muted">Requested on</small>
            <p class="mb-0">06 Aug 2025</p>
          </div>
          <div class="col-md-2">
            <span class="badge bg-warning text-dark">Pending</span>
          </div>
          <div class="col-md-2 text-end">
            <a href="{{ route('employer.guide-detail') }}" class="btn btn-sm btn-outline-primary">View</a>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@endsection
