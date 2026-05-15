@extends('layouts.mobile-employer')

@section('title', 'Workland - Branches List')
@section('page-title', 'Branches')

@section('content')

<div class="header-section mb-4">
  <h1 class="main-heading">My Branches</h1>
  <a href="{{ route('employer.add-branches') }}" class="btn btn-primary btn-sm">+ Add Branch</a>
</div>

@for($i = 0; $i < 5; $i++)
<div class="branch-card mb-3">
  <img src="{{ asset('mobile/dashboard/img/branch.png') }}" class="branch-image" alt="Branch">
  <div class="branch-details">
    <h2 class="upcoming-title">Reykjavik Branch</h2>
    <p class="text-muted mb-1">Reykjavik, Iceland</p>
    <p class="mb-0">Year Round</p>
    <div class="mt-2">
      <a href="#" class="btn btn-sm btn-outline-primary me-2">Edit</a>
      <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
    </div>
  </div>
</div>
@endfor

@endsection
