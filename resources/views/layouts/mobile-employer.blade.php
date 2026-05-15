<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Workland')</title>
  <link href="{{ asset('mobile/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mobile/dashboard/css/style.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @yield('styles')
</head>
<body>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <img src="{{ asset('mobile/dashboard/img/logo.png') }}" alt="Workland" class="logo">
    <i class="fa-solid fa-xmark" id="close-btn"></i>
  </div>
  <ul class="menu">
    <li><span>Request</span>
      <ul>
        <li><a href="{{ route('employer.search-guide') }}">Search Guide</a></li>
        <li><a href="{{ route('employer.booking-guide') }}">Guide Request</a></li>
        <li><a href="{{ route('employer.message') }}">Message</a></li>
      </ul>
    </li>
    <li><a href="{{ route('employer.add-branches') }}"><span>Add Branches</span></a></li>
    <li><span>Tour</span>
      <ul>
        <li><a href="{{ route('employer.upcoming-booking') }}">Upcoming Tour</a></li>
        <li><a href="{{ route('employer.outgoing-booking') }}">Outgoing Tour</a></li>
        <li><a href="{{ route('employer.payment-history') }}">Payment History</a></li>
      </ul>
    </li>
    <li><span>Settings</span>
      <ul>
        <li><a href="{{ route('employer.my-profile') }}">Profile</a></li>
      </ul>
    </li>
  </ul>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
  </form>
</aside>

<div class="overlay" id="overlay"></div>

<div class="container-fluid p-0">
  <div class="header-bar d-flex justify-content-between align-items-center sticky-top">
    <h5 class="mb-0">
      <i class="fa-solid fa-bars" id="menu-toggle"></i>
      @yield('page-title', 'Welcome to Workland')
    </h5>
    <span style="font-size: 36px;"><img src="{{ asset('mobile/dashboard/img/user.png') }}" alt=""></span>
  </div>

  <div class="container pt-4 pb-5">
    @yield('content')
  </div>

  <div class="nav-footer">
    <div class="d-flex justify-content-around">
      <a href="{{ route('employer.dashboard') }}" class="@if(request()->routeIs('employer.dashboard')) active-nav @endif">
        <span class="material-iconsnav"><img src="{{ asset('mobile/dashboard/img/nav-1.png') }}"></span>
      </a>
      <a href="{{ route('employer.search-guide') }}">
        <span class="material-iconsnav"><img src="{{ asset('mobile/dashboard/img/nav-2.png') }}"></span>
      </a>
      <a href="{{ route('employer.message') }}">
        <span class="material-iconsnav"><img src="{{ asset('mobile/dashboard/img/nav-3.png') }}"></span>
      </a>
      <a href="{{ route('employer.my-profile') }}">
        <span class="material-iconsnav"><img src="{{ asset('mobile/dashboard/img/nav-4.png') }}"></span>
      </a>
    </div>
  </div>
</div>

<script src="{{ asset('mobile/dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('mobile/dashboard/js/jquery-3.7.1.min.js') }}"></script>
@yield('scripts')
<script>
  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");
  const closeBtn = document.getElementById("close-btn");
  const overlay = document.getElementById("overlay");

  menuToggle.addEventListener("click", () => {
    sidebar.classList.add("active");
    overlay.classList.add("show");
  });
  closeBtn.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("show");
  });
  overlay.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("show");
  });
</script>
</body>
</html>
