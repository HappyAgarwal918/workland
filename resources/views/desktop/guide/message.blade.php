@extends('layouts.guide-dashboard')

@section('title', 'Workland - Message')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white message-container">
  <div class="row" style="height:70vh;">
    <div class="col-md-4 border-end">
      <div class="p-3 border-bottom">
        <input type="text" class="form-control" placeholder="Search messages...">
      </div>
      <div class="chat-list">
        @for($i = 1; $i <= 5; $i++)
        <div class="chat-item d-flex align-items-center p-3 border-bottom @if($i===1) active bg-light @endif" style="cursor:pointer;">
          <img src="{{ asset('assets/dashboard/img/user-' . (($i % 3) + 1) . '.jpg') }}" class="rounded-circle me-3" style="width:45px;height:45px;object-fit:cover;" alt="">
          <div>
            <h6 class="mb-0">Adventure Iceland Co.</h6>
            <small class="text-muted">Do you have availability on...</small>
          </div>
        </div>
        @endfor
      </div>
    </div>
    <div class="col-md-8 d-flex flex-column">
      <div class="p-3 border-bottom d-flex align-items-center">
        <img src="{{ asset('assets/dashboard/img/user-1.jpg') }}" class="rounded-circle me-3" style="width:40px;height:40px;object-fit:cover;" alt="">
        <h6 class="mb-0">Adventure Iceland Co.</h6>
      </div>
      <div class="flex-grow-1 p-3 overflow-auto" style="background:#f8f9fa;">
        <div class="mb-3">
          <div class="d-inline-block bg-white rounded p-2 border" style="max-width:70%;">Hello! We're interested in hiring you as our guide for August.</div>
        </div>
        <div class="mb-3 text-end">
          <div class="d-inline-block bg-primary text-white rounded p-2" style="max-width:70%;">Hi! I'm available. What dates are you looking for?</div>
        </div>
      </div>
      <div class="p-3 border-top">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Type a message...">
          <button class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
