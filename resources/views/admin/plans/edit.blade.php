@extends('layouts.admin')
@section('title', 'Edit Plan')
@section('page-title', 'Edit: ' . $plan->name)

@section('content')
<div class="mb-3">
  <a href="{{ route('admin.plans.index') }}" class="text-muted text-decoration-none">
    <i class="fa fa-arrow-left me-1"></i> Back to Plans
  </a>
</div>

<form method="POST" action="{{ route('admin.plans.update', $plan) }}">
  @csrf @method('PUT')
  @include('admin.plans.partials.form')
</form>
@endsection

@section('scripts')
@stack('scripts')
@endsection
