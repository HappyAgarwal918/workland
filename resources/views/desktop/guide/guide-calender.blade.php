@extends('layouts.guide-dashboard')

@section('title', 'Workland - Calendar')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header mb-4">
    <h1>My Calendar</h1>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="calendar-wrapper border rounded p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <button class="btn btn-outline-secondary btn-sm">← Prev</button>
          <h5 class="mb-0">August 2025</h5>
          <button class="btn btn-outline-secondary btn-sm">Next →</button>
        </div>
        <table class="table table-bordered text-center">
          <thead class="table-dark">
            <tr>
              <th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th>
            </tr>
          </thead>
          <tbody>
            @for($week = 0; $week < 5; $week++)
            <tr>
              @for($day = 1; $day <= 7; $day++)
              @php $num = $week * 7 + $day - 3; @endphp
              <td class="{{ $num >= 6 && $num <= 11 ? 'bg-primary text-white' : '' }}" style="height:60px;vertical-align:top;cursor:pointer;">
                @if($num > 0 && $num <= 31) {{ $num }} @endif
              </td>
              @endfor
            </tr>
            @endfor
          </tbody>
        </table>
        <div class="d-flex gap-3 mt-2">
          <span><span class="badge bg-primary">&nbsp;&nbsp;</span> Booked</span>
          <span><span class="badge bg-success">&nbsp;&nbsp;</span> Available</span>
          <span><span class="badge bg-secondary">&nbsp;&nbsp;</span> Unavailable</span>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="border rounded p-3">
        <h5 class="mb-3">Upcoming Tours</h5>
        @for($i = 0; $i < 3; $i++)
        <div class="border-bottom pb-2 mb-2">
          <p class="mb-0 fw-bold">Adventure Iceland Co.</p>
          <small class="text-muted">06 Aug - 11 Aug 2025</small><br>
          <small>Reykjavik, Iceland</small>
        </div>
        @endfor
      </div>
    </div>
  </div>
</div>

@endsection
