@extends('layouts.employer-dashboard')

@section('title', 'Workland - Guide Detail')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header">
    <h1>Guide Profile</h1>
  </div>

  <div class="row">
    <div class="col-md-4 text-center">
      <img src="{{ asset('assets/dashboard/img/user-1.jpg') }}" class="rounded-circle mb-3" style="width:150px;height:150px;object-fit:cover;" alt="Guide">
      <h4>Mahima Goyal</h4>
      <div class="guide-rating mb-3">
        <span>5.0</span>
        @for($s = 0; $s < 5; $s++)<i class="fas fa-star text-warning"></i>@endfor
      </div>
      <a href="{{ route('employer.booking-guide') }}" class="btn btn-primary">Send Booking Request</a>
    </div>
    <div class="col-md-8">
      <div class="guide-details-info">
        <h5 class="mb-3">Guide Information</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="info-box p-3 border rounded">
              <small class="text-muted">Languages</small>
              <p class="mb-0 fw-bold">English, Swedish, Italian</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box p-3 border rounded">
              <small class="text-muted">Driving License</small>
              <p class="mb-0 fw-bold">D1 License</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box p-3 border rounded">
              <small class="text-muted">Glacier Certification</small>
              <p class="mb-0 fw-bold">Hard Ice 1</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box p-3 border rounded">
              <small class="text-muted">Experience</small>
              <p class="mb-0 fw-bold">5+ Years</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="info-box p-3 border rounded">
              <small class="text-muted">About</small>
              <p class="mb-0">Experienced tour guide specialising in Iceland's natural landscapes, glaciers and northern lights experiences. Fluent in multiple languages with a passion for sharing Iceland's unique culture.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
