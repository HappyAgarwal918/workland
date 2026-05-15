@extends('layouts.admin')
@section('title', 'Workland Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="stat-card">
      <div class="stat-title">Employers</div>
      <div class="stat-number">{{ $stats['employers'] }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card">
      <div class="stat-title">Guides</div>
      <div class="stat-number">{{ $stats['guides'] }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card">
      <div class="stat-title">Plans</div>
      <div class="stat-number">{{ $stats['plans'] }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card">
      <div class="stat-title">Active Subscriptions</div>
      <div class="stat-number">{{ $stats['subscriptions'] }}</div>
    </div>
  </div>
</div>

<div class="mt-4">
  <a href="{{ route('admin.plans.index') }}" class="btn btn-primary">
    <i class="fa fa-tags me-1"></i> Manage Plans
  </a>
</div>
@endsection
