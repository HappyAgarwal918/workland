@extends('layouts.employer-dashboard')

@section('title', 'Workland - Add Branches')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header">
    <h1>Add Branches</h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="branch-form p-4 border rounded">
        <h5 class="mb-4">Add New Branch</h5>
        <form>
          @csrf
          <div class="mb-3">
            <label class="form-label">Branch Name</label>
            <input type="text" class="form-control" placeholder="Enter branch name">
          </div>
          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" placeholder="Enter location">
          </div>
          <div class="mb-3">
            <label class="form-label">Operating Season</label>
            <select class="form-control">
              <option>Year Round</option>
              <option>Summer Only</option>
              <option>Winter Only</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Type of Tours</label>
            <input type="text" class="form-control" placeholder="e.g. Glacier, Waterfall, Northern Lights">
          </div>
          <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="tel" class="form-control" placeholder="Enter contact number">
          </div>
          <button type="submit" class="btn btn-primary">Add Branch</button>
        </form>
      </div>
    </div>
    <div class="col-lg-6">
      <h5 class="mb-4">Existing Branches</h5>
      @for($i = 0; $i < 3; $i++)
      <div class="branch-card p-3 border rounded mb-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="mb-1">Reykjavik Branch</h6>
            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Reykjavik, Iceland</small>
            <br><small class="text-muted">Year Round</small>
          </div>
          <div>
            <a href="#" class="btn btn-sm btn-outline-primary me-1">Edit</a>
            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
          </div>
        </div>
      </div>
      @endfor
    </div>
  </div>
</div>

@endsection
