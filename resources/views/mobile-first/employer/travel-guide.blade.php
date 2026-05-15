@extends('layouts.mobile-employer')

@section('title', 'Workland - Travel Guide')
@section('page-title', 'Travel Guide')

@section('content')

<div class="mb-4">
  <h5 class="fw-bold mb-3">Find a Travel Guide</h5>
  <div class="row g-3">
    @for($i = 0; $i < 4; $i++)
    <div class="col-6">
      <div class="card guide-profile-card">
        <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="card-img-top guide-image" alt="Guide">
        <div class="guide-info p-2">
          <h6 class="card-title mb-1">Mahima Goyal</h6>
          <div class="rating mb-1">
            <small class="text-muted">5.0</small>
            @for($s=0;$s<5;$s++)<i class="fa-solid fa-star text-warning" style="font-size:10px;"></i>@endfor
          </div>
          <small><i class="fa-solid fa-circle-check text-success"></i> English</small><br>
          <small><i class="fa-solid fa-circle-check text-success"></i> D1 License</small>
          <div class="d-grid mt-2">
            <a href="{{ route('employer.search-guide') }}" class="btn btn-sm btn-primary">View</a>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@endsection
