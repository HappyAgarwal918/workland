@extends('layouts.mobile-guide')

@section('title', 'Workland - Messages')
@section('page-title', 'Messages')

@section('content')

<div class="chat-list-mobile">
  @for($i = 1; $i <= 6; $i++)
  <div class="chat-item-mobile d-flex align-items-center p-3 border-bottom" style="cursor:pointer;">
    <img src="{{ asset('mobile/dashboard/img/user.png') }}" class="rounded-circle me-3" style="width:50px;height:50px;object-fit:cover;" alt="">
    <div class="flex-grow-1">
      <div class="d-flex justify-content-between">
        <h6 class="mb-0">Adventure Iceland Co.</h6>
        <small class="text-muted">2h ago</small>
      </div>
      <small class="text-muted">Are you available on Aug 12?</small>
    </div>
  </div>
  @endfor
</div>

@endsection
