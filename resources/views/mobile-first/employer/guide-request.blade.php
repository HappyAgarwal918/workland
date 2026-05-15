@extends('layouts.mobile-employer')

@section('title', 'Workland - Search Guide')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="guide-details-card mb-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-head">Guide Details</h4>
    <span type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
      <img src="{{ asset('mobile/dashboard/img/menu.png') }}" alt="Filter">
    </span>
  </div>

  <!-- Filter Offcanvas -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffcanvas">
    <div class="offcanvas-body">
      <h2 class="filter-header">Where are you Travelling</h2>
      <div class="date-input-wrapper">
        <span><i class="fa-regular fa-calendar"></i></span>
        <input type="text" class="form-control" value="20 Aug - 21 Aug 2025">
      </div>
      <form>
        @foreach(['Operating Season','Company Size','Location','Company Language','License Requirements','Type of Tours','Available Roles','Contract Type','Pay Model','Perks/Benefits'] as $filter)
        <div class="form-check">
          <input class="form-check-input custom-check" type="checkbox">
          <label class="form-check-label">{{ $filter }}</label>
        </div>
        @endforeach
      </form>
    </div>
  </div>

  <div class="row g-2">
    <div class="col-6">
      <label class="form-label">Area</label>
      <div class="form-control-wrapper">
        <span class="form-control-icon"><img src="{{ asset('mobile/dashboard/img/guide-1.png') }}" alt=""></span>
        <input type="text" class="form-control" placeholder="Reykjavik, Iceland">
      </div>
    </div>
    <div class="col-6">
      <label class="form-label">Date</label>
      <div class="form-control-wrapper">
        <span class="form-control-icon"><img src="{{ asset('mobile/dashboard/img/guide-2.png') }}" alt=""></span>
        <input type="text" class="form-control" placeholder="20 Aug - 21 Aug 2025">
      </div>
    </div>
    <div class="col-6">
      <label class="form-label">No. of Day</label>
      <div class="form-control-wrapper">
        <span class="form-control-icon"><img src="{{ asset('mobile/dashboard/img/guide-3.png') }}" alt=""></span>
        <input type="text" class="form-control" placeholder="2">
      </div>
    </div>
    <div class="col-6">
      <label class="form-label">No. of Adults</label>
      <div class="form-control-wrapper">
        <span class="form-control-icon"><img src="{{ asset('mobile/dashboard/img/guide-4.png') }}" alt=""></span>
        <input type="text" class="form-control" placeholder="4">
      </div>
    </div>
  </div>
  <div class="d-grid mt-3">
    <button class="btn-frm-all" type="button">Search</button>
  </div>
</div>

<div class="row g-3">
  @for($i = 0; $i < 4; $i++)
  <div class="col-6">
    <div class="card guide-profile-card">
      <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="card-img-top guide-image" alt="Guide">
      <div class="guide-info">
        <h6 class="card-title">Mahima Goyal</h6>
        <div class="rating mb-2">
          <small class="text-muted">5.0</small>
          @for($s = 0; $s < 5; $s++)<i class="fa-solid fa-star"></i>@endfor
        </div>
        <div class="text-start d-inline-block">
          <div class="info-item"><i class="fa-solid fa-circle-check"></i> English, Swedish</div>
          <div class="info-item"><i class="fa-solid fa-circle-check"></i> D1 license</div>
          <div class="info-item"><i class="fa-solid fa-circle-check"></i> Hard Ice 1</div>
        </div>
        <div class="d-grid gap-2 mt-3">
          <a class="btn btn-sm btn-send-request" href="{{ route('employer.calendar') }}">Send Request</a>
          <a class="btn btn-sm btn-see-details" href="{{ route('employer.guide-detail') }}">See Details</a>
        </div>
      </div>
    </div>
  </div>
  @endfor
</div>

@endsection
