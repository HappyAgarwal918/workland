@extends('layouts.guide-dashboard')

@section('title', 'Workland - My Profile')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header mb-4">
    <h1>My Profile</h1>
  </div>

  <div class="row">
    <div class="col-md-3 text-center">
      <div class="profile-img-wrapper mb-3" style="position:relative;display:inline-block;">
        <img src="{{ asset('assets/dashboard/img/profile.png') }}" class="rounded-circle" style="width:150px;height:150px;object-fit:cover;" alt="Profile">
        <label for="profileImg" class="btn btn-sm btn-primary" style="position:absolute;bottom:0;right:0;cursor:pointer;">
          <i class="fas fa-camera"></i>
        </label>
        <input type="file" id="profileImg" class="d-none" accept="image/*">
      </div>
      <h5>{{ auth()->user()->name ?? 'Guide Name' }}</h5>
      <p class="text-muted">Tour Guide</p>
    </div>
    <div class="col-md-9">
      <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Languages Spoken</label>
            <input type="text" class="form-control" placeholder="e.g. English, Swedish, Italian">
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" placeholder="Enter phone number">
          </div>
          <div class="col-md-6">
            <label class="form-label">Driving License</label>
            <input type="text" class="form-control" placeholder="e.g. D1 License">
          </div>
          <div class="col-md-6">
            <label class="form-label">Glacier Certification</label>
            <input type="text" class="form-control" placeholder="e.g. Hard Ice 1">
          </div>
          <div class="col-md-6">
            <label class="form-label">Experience (Years)</label>
            <input type="number" class="form-control" placeholder="Years of experience" min="0">
          </div>
          <div class="col-md-6">
            <label class="form-label">Specialisation</label>
            <input type="text" class="form-control" placeholder="e.g. Glacier, Northern Lights">
          </div>
          <div class="col-12">
            <label class="form-label">About Me</label>
            <textarea class="form-control" rows="4" placeholder="Tell employers about yourself..."></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Save Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
