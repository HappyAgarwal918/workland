@extends('layouts.employer-dashboard')

@section('title', 'Workland - Search Guide')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="dropdown">
    <div class="page-header">
      <h1>Guide Details</h1>
      <div class="filter-wrapper">
        <button class="menu-toggle" type="button" id="filterDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('assets/dashboard/img/menu-bar.png') }}" alt="Filter">
        </button>
        <div class="filter-card">
          <h3>Where are You Travelling</h3>
          <div class="date-box">
            <span class="icon">📅</span>
            <input type="text" value="20 Aug - 21 Aug 2025" readonly>
          </div>
          @foreach(['Operating Season','Company Size','Location','Company Language','License Requirements','Type of Tours','Available Roles','Contract Type'] as $filter)
          <label class="check-item">
            <input type="checkbox"><span class="custom-check"></span> {{ $filter }}
          </label>
          @endforeach
        </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      @for($i = 0; $i < 4; $i++)
      <div class="col-lg-3">
        <div class="guide-card">
          <img src="{{ asset('assets/dashboard/img/user-1.jpg') }}" class="guide-img" alt="Guide">
          <div class="guide-info">
            <h5 class="guide-name">Mahima Goyal</h5>
            <div class="guide-rating">
              <span>5.0</span>
              @for($s = 0; $s < 5; $s++)<i class="fas fa-star text-warning"></i>@endfor
            </div>
            <div class="guide-tags">
              <span><i class="fas fa-check-circle"></i> English, Swedish</span>
              <span><i class="fas fa-check-circle"></i> D1 License</span>
              <span><i class="fas fa-check-circle"></i> Hard Ice 1</span>
            </div>
            <div class="guide-actions">
              <a href="{{ route('employer.guide-detail') }}" class="btn btn-sm btn-primary">View Profile</a>
              <a href="{{ route('employer.booking-guide') }}" class="btn btn-sm btn-outline-primary">Send Request</a>
            </div>
          </div>
        </div>
      </div>
      @endfor
    </div>
  </div>
</div>

@endsection
