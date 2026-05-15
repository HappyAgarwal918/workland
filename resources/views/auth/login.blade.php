@extends('layouts.frontend')

@section('title', 'Workland - Login')

@section('content')
<section class="py-5" style="min-height:60vh;display:flex;align-items:center;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h2 class="fw-bold mb-2">Welcome Back</h2>
        <p class="text-muted mb-5">Please choose how you'd like to log in.</p>
        <div class="d-grid gap-3">
          <a href="{{ route('employer.login') }}" class="btn btn-primary btn-lg py-3">
            Login as Employer
          </a>
          <a href="{{ route('guide.login') }}" class="btn btn-outline-primary btn-lg py-3">
            Login as Tour Guide
          </a>
        </div>
        <p class="mt-4 text-muted">
          Don't have an account?
          <a href="{{ route('employer.register') }}">Register as Employer</a> or
          <a href="{{ route('guide.register') }}">Register as Guide</a>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
