@extends('layouts.guide-dashboard')

@section('title', 'Workland - Guide Dashboard')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="checkout-btn-map mb-4">
  <a href="{{ route('map') }}" target="_blank">Checkout the Map</a>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="stat-card">
      <div class="stat-title">Upcoming Tours</div>
      <div class="stat-number">10</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card">
      <div class="stat-title">Outgoing Tours</div>
      <div class="stat-number">15</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card">
      <div class="stat-title">Pending Requests</div>
      <div class="stat-number">5</div>
    </div>
  </div>
</div>

@endsection
