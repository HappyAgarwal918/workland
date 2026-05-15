@extends('layouts.mobile-employer')

@section('title', 'Workland - Payment History')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="header-section mb-4">
  <h1 class="main-heading">Payment History</h1>
</div>

@for($i = 1; $i <= 6; $i++)
<div class="branch-card mb-3 p-3">
  <div class="row align-items-center">
    <div class="col-3">
      <img src="{{ asset('mobile/dashboard/img/pay-img.png') }}" class="img-fluid" alt="Payment">
    </div>
    <div class="col-9">
      <h6 class="mb-1">Mahima Goyal</h6>
      <small class="text-muted">06 Aug 2025</small>
      <p class="mb-0 fw-bold">ISK 45,000</p>
      <span class="badge bg-success">Paid</span>
    </div>
  </div>
</div>
@endfor

@endsection
