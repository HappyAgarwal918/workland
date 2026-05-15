@extends('layouts.mobile-employer')

@section('title', 'Workland - Calendar')
@section('page-title', 'Select Date')

@section('content')

<div class="mb-4">
  <h5 class="fw-bold mb-3">Select Tour Date</h5>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary btn-sm">← Prev</button>
    <h6 class="mb-0">August 2025</h6>
    <button class="btn btn-outline-secondary btn-sm">Next →</button>
  </div>

  <table class="table table-bordered text-center">
    <thead class="table-dark">
      <tr>
        <th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th><th>S</th>
      </tr>
    </thead>
    <tbody>
      @for($week = 0; $week < 5; $week++)
      <tr>
        @for($day = 1; $day <= 7; $day++)
        @php $num = $week * 7 + $day - 3; @endphp
        <td class="{{ $num >= 6 && $num <= 11 ? 'bg-primary text-white' : '' }}" style="height:40px;vertical-align:middle;cursor:pointer;font-size:13px;">
          @if($num > 0 && $num <= 31) {{ $num }} @endif
        </td>
        @endfor
      </tr>
      @endfor
    </tbody>
  </table>

  <div class="d-grid mt-4">
    <a href="{{ route('employer.booking-guide') }}" class="btn-frm-all text-center py-2">Confirm Booking</a>
  </div>
</div>

@endsection
