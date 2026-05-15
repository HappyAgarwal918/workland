@extends('layouts.mobile-guide')

@section('title', 'Workland - Outgoing Tours')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="header-section mb-3">
  <h1 class="main-heading">Outgoing Tours</h1>
</div>

@php
  $locations = ['Reykjavik iceland', 'Akureyri iceland', 'Jökulsárlón iceland'];
@endphp

@foreach($locations as $location)
<div class="branch-card mb-3">
  <img src="{{ asset('mobile/dashboard/img/branch.png') }}" class="branch-image" alt="Location">
  <div class="branch-details">
    <h2 class="upcoming-title">{{ $location }}</h2>
    <div class="row mb-2">
      <div class="col-6"><div class="guide-detail"><h4>Employer</h4><p>Iceland Tours</p></div></div>
      <div class="col-6"><div class="guide-detail"><h4>Activity</h4><p>Northern Lights</p></div></div>
    </div>
    <div class="row">
      <div class="col-6"><div class="guide-detail"><h4>Start Date</h4><p>01 Jul 2025</p></div></div>
      <div class="col-6"><div class="guide-detail"><h4>End Date</h4><p>05 Jul 2025</p></div></div>
    </div>
    <span class="badge bg-success mt-2">Completed</span>
  </div>
</div>
@endforeach

@endsection
