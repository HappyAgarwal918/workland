@extends('layouts.mobile-guide')

@section('title', 'Workland - Calendar')
@section('page-title', 'My Calendar')

@section('content')

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
      <td class="{{ $num >= 6 && $num <= 11 ? 'bg-primary text-white' : '' }}" style="height:40px;vertical-align:middle;cursor:pointer;font-size:12px;">
        @if($num > 0 && $num <= 31) {{ $num }} @endif
      </td>
      @endfor
    </tr>
    @endfor
  </tbody>
</table>

<div class="d-flex gap-3 mt-2 mb-4 flex-wrap">
  <span><span class="badge bg-primary">&nbsp;&nbsp;</span> Booked</span>
  <span><span class="badge bg-success">&nbsp;&nbsp;</span> Available</span>
</div>

<h6 class="fw-bold mb-3">Upcoming Tours</h6>
@for($i = 0; $i < 3; $i++)
<div class="border-bottom pb-2 mb-2">
  <p class="mb-0 fw-bold">Adventure Iceland Co.</p>
  <small class="text-muted">06 Aug - 11 Aug 2025 · Reykjavik</small>
</div>
@endfor

@endsection
