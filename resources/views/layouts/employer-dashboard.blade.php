<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Workland - Employer')</title>
  <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/dashboard/css/style.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  @yield('styles')
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <div class="sidebar-header">
      <img src="{{ asset('assets/dashboard/img/logo.png') }}" alt="Workland Logo" class="img-fluid">
    </div>
    <nav class="sidebar-menu flex-grow-1">
      <div class="menu-title">
        <a href="{{ route('employer.dashboard') }}" class="without-child @if(request()->routeIs('employer.dashboard')) active @endif">Dashboard</a>
      </div>
      <div class="menu-title"><a href="#" class="without-child">Request</a></div>
      <a href="{{ route('employer.search-guide') }}" class="sub-item-link position-relative @if(request()->routeIs('employer.search-guide')) active @endif">
        <span class="sub-item">Search Guide</span>
      </a>
      <a href="{{ route('employer.booking-guide') }}" class="sub-item-link position-relative @if(request()->routeIs('employer.booking-guide')) active @endif">
        <span class="sub-item">Booking Request</span>
      </a>
      <a href="{{ route('employer.message') }}" class="sub-item-link @if(request()->routeIs('employer.message')) active @endif">
        <span class="sub-item">Message</span>
      </a>
      <a href="{{ route('employer.add-branches') }}" class="sub-item-link @if(request()->routeIs('employer.add-branches')) active @endif">
        <span class="sub-item">Add Branches</span>
      </a>
      <div class="menu-title"><a href="#" class="without-child">Tour</a></div>
      <a href="{{ route('employer.upcoming-booking') }}" class="sub-item-link position-relative @if(request()->routeIs('employer.upcoming-booking')) active @endif">
        <span class="sub-item">Upcoming Bookings</span>
      </a>
      <a href="{{ route('employer.outgoing-booking') }}" class="sub-item-link @if(request()->routeIs('employer.outgoing-booking')) active @endif">
        <span class="sub-item">Finished Bookings</span>
      </a>
      <a href="{{ route('employer.payment-history') }}" class="sub-item-link @if(request()->routeIs('employer.payment-history')) active @endif">
        <span class="sub-item">Payment History</span>
      </a>
      <div class="menu-title"><a href="#" class="without-child">Settings</a></div>
      <a href="{{ route('employer.my-profile') }}" class="sub-item-link @if(request()->routeIs('employer.my-profile')) active @endif">
        <span class="sub-item">My Profile</span>
      </a>
      <a href="{{ route('employer.subscription') }}" class="sub-item-link @if(request()->routeIs('employer.subscription*')) active @endif">
        <span class="sub-item">Subscription</span>
      </a>
    </nav>
    <div class="p-3">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content flex-grow-1">
    <div class="header-top">
      <h2 class="mb-0">@yield('page-title', 'Welcome to Workland')</h2>
      <div class="user-info">
        <div class="user-avatar bg-primary" style="background-image: url('{{ asset('assets/dashboard/img/user.png') }}');"></div>
        Hi, {{ auth()->user()->name ?? 'User' }}
      </div>
    </div>
    <div class="dashboard-content">
      @yield('content')
    </div>
  </div>
</div>

<script src="{{ asset('assets/dashboard/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
