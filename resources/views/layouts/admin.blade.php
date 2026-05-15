<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Workland Admin')</title>
  <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/dashboard/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  @yield('styles')
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <div class="sidebar-header">
      <img src="{{ asset('assets/dashboard/img/logo.png') }}" alt="Workland" class="img-fluid">
    </div>
    <nav class="sidebar-menu flex-grow-1">
      <div class="menu-title">
        <a href="{{ route('admin.dashboard') }}" class="without-child @if(request()->routeIs('admin.dashboard')) active @endif">
          Dashboard
        </a>
      </div>
      <div class="menu-title"><a href="#" class="without-child">Subscriptions</a></div>
      <a href="{{ route('admin.plans.index') }}" class="sub-item-link @if(request()->routeIs('admin.plans.*')) active @endif">
        <span class="sub-item">Plans</span>
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
      <h2 class="mb-0">@yield('page-title', 'Admin Panel')</h2>
      <div class="user-info">
        <div class="user-avatar bg-danger"></div>
        Admin &mdash; {{ auth()->user()->name }}
      </div>
    </div>
    <div class="dashboard-content">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @yield('content')
    </div>
  </div>
</div>

<script src="{{ asset('assets/dashboard/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>
