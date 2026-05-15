@extends('layouts.mobile-employer')

@section('title', 'Workland - Profile')
@section('page-title', 'My Profile')

@section('content')

<div class="text-center mb-4">
  <div style="position:relative;display:inline-block;">
    <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="rounded-circle" style="width:100px;height:100px;object-fit:cover;" alt="Profile">
    <label for="mobileProfileImg" class="btn btn-sm btn-primary" style="position:absolute;bottom:0;right:0;cursor:pointer;">
      <img src="{{ asset('mobile/dashboard/img/camera.png') }}" style="width:20px;" alt="Upload">
    </label>
    <input type="file" id="mobileProfileImg" class="d-none" accept="image/*">
  </div>
  <h5 class="mt-2">{{ auth()->user()->name ?? 'Employer Name' }}</h5>
  <small class="text-muted">Employer</small>
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
    <label class="form-label">Company Name</label>
    <input type="text" class="form-control" placeholder="Enter company name">
  </div>
  <div class="mb-3">
    <label class="form-label">Phone Number</label>
    <input type="tel" class="form-control" placeholder="Enter phone number">
  </div>
  <div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text" class="form-control" placeholder="Enter location">
  </div>
  <div class="d-grid">
    <button type="submit" class="btn-frm-all">Save Profile</button>
  </div>
</form>

@endsection
