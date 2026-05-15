@extends('layouts.guide-dashboard')

@section('title', 'Workland - Upcoming Tour Requests')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="booking-container bg-white">
  <div class="page-header d-flex justify-content-between align-items-center mb-4">
    <h1>Upcoming Tour Requests</h1>
    <select class="form-select" style="width:auto;">
      <option>12 Aug 2025</option>
      <option>16 Aug 2025</option>
      <option>19 Aug 2025</option>
    </select>
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
        <h4>{{ $location }}</h4>
        <div class="row">
          <div class="col-md-3"><small class="text-muted">Employer</small><p class="fw-bold mb-1">Adventure Co.</p></div>
          <div class="col-md-3"><small class="text-muted">Activity</small><p class="fw-bold mb-1">Glacier Tour</p></div>
          <div class="col-md-3"><small class="text-muted">Start Date</small><p class="fw-bold mb-1">06 Aug 2025</p></div>
          <div class="col-md-3"><small class="text-muted">End Date</small><p class="fw-bold mb-1">11 Aug 2025</p></div>
        </div>
        <span class="badge bg-primary">Confirmed</span>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
