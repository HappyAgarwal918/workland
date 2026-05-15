@extends('layouts.guide-dashboard')

@section('title', 'Workland - Outgoing Tour Requests')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="booking-container bg-white">
  <div class="page-header d-flex justify-content-between align-items-center mb-4">
    <h1>Outgoing Tour Requests</h1>
    <select class="form-select" style="width:auto;">
      <option>All</option>
      <option>This Month</option>
      <option>Last Month</option>
    </select>
  </div>

  @php
    $locations = ['Reykjavik, Iceland', 'Akureyri, Iceland', 'Jökulsárlón, Iceland'];
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
          <div class="col-md-3"><small class="text-muted">Employer</small><p class="fw-bold mb-1">Iceland Tours</p></div>
          <div class="col-md-3"><small class="text-muted">Activity</small><p class="fw-bold mb-1">Northern Lights</p></div>
          <div class="col-md-3"><small class="text-muted">Start Date</small><p class="fw-bold mb-1">01 Jul 2025</p></div>
          <div class="col-md-3"><small class="text-muted">End Date</small><p class="fw-bold mb-1">05 Jul 2025</p></div>
        </div>
        <span class="badge bg-success">Completed</span>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
