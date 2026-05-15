@extends('layouts.mobile-guide')

@section('title', 'Workland - Profile')
@section('page-title', 'My Profile')

@section('content')

<div class="text-center mb-4">
  <div style="position:relative;display:inline-block;">
    <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="rounded-circle" style="width:100px;height:100px;object-fit:cover;" alt="Profile">
    <label for="guideProfileImg" class="btn btn-sm btn-primary" style="position:absolute;bottom:0;right:0;cursor:pointer;">
      <img src="{{ asset('mobile/dashboard/img/camera.png') }}" style="width:20px;" alt="Upload">
    </label>
    <input type="file" id="guideProfileImg" class="d-none" accept="image/*">
  </div>
  <h5 class="mt-2">{{ auth()->user()->name ?? 'Guide Name' }}</h5>
  <small class="text-muted">Tour Guide</small>
</div>

<form method="POST" action="{{ route('profile.update') }}">
  @csrf
  @method('PATCH')
  <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Languages</label>
    <input type="text" class="form-control" placeholder="e.g. English, Swedish">
  </div>
  <div class="mb-3">
    <label class="form-label">Driving License</label>
    <input type="text" class="form-control" placeholder="e.g. D1 License">
  </div>
  <div class="mb-3">
    <label class="form-label">Glacier Certification</label>
    <input type="text" class="form-control" placeholder="e.g. Hard Ice 1">
  </div>
  <div class="mb-3">
    <label class="form-label">Experience (Years)</label>
    <input type="number" class="form-control" placeholder="Years of experience" min="0">
  </div>
  <div class="d-grid">
    <button type="submit" class="btn-frm-all">Save Profile</button>
  </div>
</form>

@endsection
