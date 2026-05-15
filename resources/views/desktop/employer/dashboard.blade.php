@extends('layouts.employer-dashboard')

@section('title', 'Workland - Employer Dashboard')
@section('page-title', 'Welcome to Workland')

@section('content')

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
      <div class="stat-title">Guide Request</div>
      <div class="stat-number">30</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card">
      <div class="stat-title">Total Branches</div>
      <div class="stat-number">30</div>
    </div>
  </div>
</div>

<div class="search-guide mt-5">
  <button class="form-control search-input" aria-label="Search in Guide" data-bs-toggle="modal" data-bs-target="#searchguideModal">Search in Guide</button>

  <div class="modal fade" id="searchguideModal" tabindex="-1" aria-labelledby="searchguideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="booking-card">
          <div class="peeking-avatar"></div>
          <form class="row g-4">
            <div class="col-md-4">
              <label for="area" class="form-label">Area</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" class="form-control" id="area" placeholder="Choose a Area">
              </div>
            </div>
            <div class="col-md-4">
              <label for="selectDate" class="form-label">Select Date</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="far fa-calendar-alt"></i></span>
                <input type="text" class="form-control" id="selectDate" placeholder="Select Date" onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
            </div>
            <div class="col-md-4">
              <label for="noOfDay" class="form-label">No. of Day</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-calendar-alt"></i></span>
                <input type="number" class="form-control" id="noOfDay" placeholder="Day">
              </div>
            </div>
            <div class="col-md-4">
              <label for="noOfAdults" class="form-label">No. of Adults</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-user-friends"></i></span>
                <input type="number" class="form-control" id="noOfAdults" placeholder="No. of adult">
              </div>
            </div>
            <div class="col-md-4">
              <label for="noOfKids" class="form-label">No. of kids (below 13)</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-child"></i></span>
                <input type="number" class="form-control" id="noOfKids" placeholder="No. of kids (below 13)">
              </div>
            </div>
            <div class="col-lg-4">
              <label class="form-label text-muted fw-bold">Certifications</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-calendar-alt"></i></span>
                <input type="text" class="form-control text-center">
              </div>
            </div>
            <div class="col-lg-4">
              <label class="form-label text-muted fw-bold">Driving License</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-calendar-alt"></i></span>
                <input type="text" class="form-control text-center">
              </div>
            </div>
            <div class="col-lg-4">
              <label class="form-label text-muted fw-bold">Glacier Certifications</label>
              <div class="custom-input-group">
                <span class="icon-addon"><i class="fas fa-calendar-alt"></i></span>
                <input type="text" class="form-control text-center">
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label invisible">Button Placeholder</label>
              <button type="submit" class="btn btn-search-guide">Search Guide</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
