@extends('layouts.employer-dashboard')

@section('title', 'Workland - Booking Guide')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header">
    <h1>Guide Details</h1>
  </div>

  <div class="row g-4 justify-content-center booking-grid-box">
    @for($i = 0; $i < 4; $i++)
    <div class="col-lg-12">
      <div class="guide-card booking-grid">
        <div class="row align-items-center">
          <div class="col-md-2">
            <img src="{{ asset('assets/dashboard/img/user-1.jpg') }}" class="guide-img-sm rounded-circle" alt="Guide">
          </div>
          <div class="col-md-4">
            <h5 class="guide-name mb-1">Mahima Goyal</h5>
            <div class="guide-rating">
              <span>5.0</span>
              @for($s = 0; $s < 5; $s++)<i class="fas fa-star text-warning"></i>@endfor
            </div>
            <small><i class="fas fa-check-circle text-success"></i> English, Swedish, Italian</small><br>
            <small><i class="fas fa-check-circle text-success"></i> D1 License</small>
          </div>
          <div class="col-md-3">
            <div class="booking-detail">
              <small class="text-muted">Date</small>
              <p class="mb-1">06 Aug - 11 Aug 2025</p>
              <small class="text-muted">Location</small>
              <p class="mb-0">Reykjavik, Iceland</p>
            </div>
          </div>
          <div class="col-md-3 text-end">
            <span class="badge bg-warning text-dark">Pending</span>
            <div class="mt-2">
              <a href="#" class="btn btn-sm btn-outline-primary me-1">Accept</a>
              <a href="#" class="btn btn-sm btn-outline-danger">Decline</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@endsection
