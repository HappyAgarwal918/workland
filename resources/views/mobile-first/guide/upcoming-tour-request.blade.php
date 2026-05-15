@extends('layouts.mobile-guide')

@section('title', 'Workland - Upcoming Tours')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="header-section d-flex justify-content-between align-items-center mb-3">
  <h1 class="main-heading">Upcoming Tours</h1>
  <div class="sort-by">
    <select>
      <option>12 Aug 2025</option>
      <option>16 Aug 2025</option>
    </select>
  </div>
</div>

@php
  $locations = ['Reykjavik iceland', 'Akureyri iceland', 'Jökulsárlón iceland', 'Selfoss iceland'];
@endphp

@foreach($locations as $location)
<div class="branch-card mb-3">
  <img src="{{ asset('mobile/dashboard/img/branch.png') }}" class="branch-image" alt="Location">
  <div class="branch-details">
    <h2 class="upcoming-title">{{ $location }}</h2>
    <div class="row mb-2">
      <div class="col-6"><div class="guide-detail"><h4>Employer</h4><p>Adventure Co.</p></div></div>
      <div class="col-6"><div class="guide-detail"><h4>Activity</h4><p>Glacier Tour</p></div></div>
    </div>
    <div class="row">
      <div class="col-6"><div class="guide-detail"><h4>Start Date</h4><p>06 Aug 2025</p></div></div>
      <div class="col-6"><div class="guide-detail"><h4>End Date</h4><p>11 Aug 2025</p></div></div>
    </div>
  </div>
</div>
@endforeach

@endsection
