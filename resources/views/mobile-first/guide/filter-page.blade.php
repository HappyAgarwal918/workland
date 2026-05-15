@extends('layouts.mobile-guide')

@section('title', 'Workland - Filter')
@section('page-title', 'Filter')

@section('content')

<div class="filter-container">
  <div class="tabs d-flex gap-2 flex-wrap mb-3">
    <button class="btn btn-primary btn-sm tab active">Operating Season</button>
    <button class="btn btn-outline-secondary btn-sm tab">Company size</button>
    <button class="btn btn-outline-secondary btn-sm tab">Location</button>
    <button class="btn btn-outline-secondary btn-sm tab">Pay model</button>
  </div>

  <div class="filter-section">
    <h6 class="fw-bold mt-3">Operating Season</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Year-Round</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Summer only</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Winter only</span>
    </div>

    <h6 class="fw-bold">Company Size</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">(Number of Employees/Guides)</span>
    </div>

    <h6 class="fw-bold">Location</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Region</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">City</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Pick-up area</span>
    </div>

    <h6 class="fw-bold">Company language(s)</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">English-speaking workplace</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Local language Required</span>
    </div>

    <h6 class="fw-bold">License requirements</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Driving license categories</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Skipper's license</span>
    </div>

    <h6 class="fw-bold">Type of tours</h6>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Glacier guiding</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Hiking/trekking</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">City tours</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Boat tours</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Whale watching</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Super Jeep</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Northern Lights</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Kayak tours</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Horseback Riding</span>
      <span class="badge rounded-pill bg-light text-dark border px-3 py-2" style="cursor:pointer;">Volcano tours</span>
    </div>

    <div class="d-grid mt-4">
      <button class="btn-frm-all">Apply Filters</button>
    </div>
  </div>
</div>

@endsection
