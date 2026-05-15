@extends('layouts.employer-dashboard')

@section('title', 'Workland - Upcoming Bookings')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="booking-container bg-white">
  <div class="page-header d-flex justify-content-between align-items-center mb-4">
    <h1>Upcoming Booking</h1>
    <div class="sort-dropdown">
      <span class="sort-text">sort by</span>
      <select class="form-select d-inline-block" style="width:auto;">
        <option>12 Aug 2025</option>
        <option>16 Aug 2025</option>
        <option>19 Aug 2025</option>
      </select>
    </div>
  </div>

  @php
    $locations = ['Reykjavik, Iceland', 'Akureyri, Iceland', 'Jökulsárlón, Iceland', 'Selfoss, Iceland'];
  @endphp

  @foreach($locations as $location)
  <div class="booking-card mb-4 p-4 border rounded">
    <div class="row align-items-center">
      <div class="col-md-3">
        <img src="{{ asset('assets/dashboard/img/map-img.png') }}" class="img-fluid rounded" alt="Location">
      </div>
      <div class="col-md-9">
        <h4 class="upcoming-title">{{ $location }}</h4>
        <div class="row">
          <div class="col-md-3">
            <small class="text-muted">Guide Name</small>
            <p class="fw-bold mb-1">Rajesh Kumar</p>
          </div>
          <div class="col-md-3">
            <small class="text-muted">Activity</small>
            <p class="fw-bold mb-1">Travelling</p>
          </div>
          <div class="col-md-3">
            <small class="text-muted">Start Date</small>
            <p class="fw-bold mb-1">06 Aug 2025</p>
          </div>
          <div class="col-md-3">
            <small class="text-muted">End Date</small>
            <p class="fw-bold mb-1">11 Aug 2025</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
