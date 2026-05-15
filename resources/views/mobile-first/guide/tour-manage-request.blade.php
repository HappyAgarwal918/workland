@extends('layouts.mobile-guide')

@section('title', 'Workland - Manage Requests')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="header-section mb-3">
  <h1 class="main-heading">Tour Requests</h1>
</div>

@for($i = 0; $i < 5; $i++)
<div class="branch-card mb-3 p-3">
  <div class="d-flex justify-content-between align-items-start mb-2">
    <div class="d-flex align-items-center">
      <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="rounded-circle me-2" style="width:45px;height:45px;object-fit:cover;" alt="">
      <div>
        <h6 class="mb-0">Adventure Iceland Co.</h6>
        <small class="text-muted">Reykjavik, Iceland</small>
      </div>
    </div>
    <span class="badge bg-warning text-dark">Pending</span>
  </div>
  <div class="row g-2 mb-2">
    <div class="col-6"><small class="text-muted">Date</small><p class="mb-0 fw-bold">06 Aug 2025</p></div>
    <div class="col-6"><small class="text-muted">Duration</small><p class="mb-0 fw-bold">5 Days</p></div>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('guide.manage-request-view') }}" class="btn btn-sm btn-outline-primary flex-fill">View</a>
    <a href="#" class="btn btn-sm btn-success flex-fill">Accept</a>
    <a href="#" class="btn btn-sm btn-danger flex-fill">Decline</a>
  </div>
</div>
@endfor

@endsection
