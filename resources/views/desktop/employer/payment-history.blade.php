@extends('layouts.employer-dashboard')

@section('title', 'Workland - Payment History')
@section('page-title', 'Welcome to Workland')

@section('content')

<div class="bg-white">
  <div class="page-header mb-4">
    <h1>Payment History</h1>
  </div>

  <div class="table-responsive">
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Guide Name</th>
          <th>Location</th>
          <th>Tour Date</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @for($i = 1; $i <= 8; $i++)
        <tr>
          <td>{{ $i }}</td>
          <td>
            <div class="d-flex align-items-center">
              <img src="{{ asset('assets/dashboard/img/user-' . (($i % 3) + 1) . '.jpg') }}" class="rounded-circle me-2" style="width:35px;height:35px;object-fit:cover;" alt="">
              Mahima Goyal
            </div>
          </td>
          <td>Reykjavik, Iceland</td>
          <td>06 Aug 2025</td>
          <td>ISK 45,000</td>
          <td><span class="badge bg-success">Paid</span></td>
          <td><a href="#" class="btn btn-sm btn-outline-primary">Receipt</a></td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>

@endsection
