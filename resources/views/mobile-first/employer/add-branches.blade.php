@extends('layouts.mobile-employer')

@section('title', 'Workland - Add Branches')
@section('page-title', 'Add Branches')

@section('content')

<div class="mb-4">
  <h5 class="fw-bold mb-3">Add New Branch</h5>
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
      <input type="text" class="form-control" placeholder="e.g. Glacier, Waterfall">
    </div>
    <div class="d-grid">
      <button type="submit" class="btn-frm-all">Add Branch</button>
    </div>
  </form>
</div>

<h5 class="fw-bold mb-3">Existing Branches</h5>
@for($i = 0; $i < 3; $i++)
<div class="branch-card mb-3 p-3">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h6 class="mb-0">Reykjavik Branch</h6>
      <small class="text-muted">Reykjavik, Iceland</small>
    </div>
    <div>
      <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
    </div>
  </div>
</div>
@endfor

@endsection
