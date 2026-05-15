<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Workland')</title>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @yield('styles')
</head>
<body>

  <!-- Header -->
  <header>
    <nav class="navbar home-pageheadre navbar-expand-lg">
      <div class="container-lg">
        <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-center" href="{{ route('home') }}">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Workland Logo" style="width:90px">
        </a>
        <div class="collapse navbar-collapse d-none d-lg-flex">
          <ul class="navbar-nav m-auto">
            <li class="nav-item"><a class="nav-link @yield('nav-home')" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link @yield('nav-about')" href="{{ route('about-us') }}">About us</a></li>
            <li class="nav-item"><a class="nav-link @yield('nav-map')" href="{{ route('map') }}">Map</a></li>
            <li class="nav-item"><a class="nav-link @yield('nav-pricing')" href="{{ route('pricing') }}">Pricing</a></li>
            <li class="nav-item"><a class="nav-link @yield('nav-blogs')" href="{{ route('blogs') }}">Base North Blog</a></li>
            <li><a href="{{ route('contact-us') }}" class="nav-link @yield('nav-contact')">Contact us</a></li>
          </ul>
          <div class="d-flex align-items-center">
            <div class="dropdown login-dropdown">
              <a href="#" class="btn-contact dropdown-toggle" id="signupDropdown" data-bs-toggle="dropdown" aria-expanded="false">Sign Up</a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('employer.register') }}">Signup as Employer</a></li>
                <li><a class="dropdown-item" href="{{ route('guide.register') }}">Signup as Guide</a></li>
              </ul>
            </div>
            <div class="dropdown login-dropdown">
              <a href="#" class="btn-login dropdown-toggle" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('employer.login') }}">Login as Employer</a></li>
                <li><a class="dropdown-item" href="{{ route('guide.login') }}">Login as Guide</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Offcanvas Mobile Menu -->
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileMenu">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title"></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">About us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('map') }}">Map</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Base North Blog</a></li>
        </ul>
        <hr>
        <a href="{{ route('contact-us') }}" class="btn-contact d-block mb-2">Contact us</a>
        <a href="{{ route('employer.login') }}" class="d-block mb-1">Login as Employer</a>
        <a href="{{ route('guide.login') }}" class="d-block">Login as Guide</a>
      </div>
    </div>
  </header>

  @yield('content')

  <!-- Footer -->
  <footer class="footer">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-3">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Workland Logo" class="footer-logo">
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-x-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <h6 class="mb-3">Links</h6>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="text-decoration-none text-dark">Home</a></li>
            <li><a href="{{ route('about-us') }}" class="text-decoration-none text-dark">About us</a></li>
            <li><a href="{{ route('pricing') }}" class="text-decoration-none text-dark">Pricing</a></li>
            <li><a href="#" class="text-decoration-none text-dark">The Workforce</a></li>
            <li><a href="#" class="text-decoration-none text-dark">Organisations</a></li>
            <li><a href="{{ route('blogs') }}" class="text-decoration-none text-dark">Base North Blog</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="mb-3">Contact Us</h6>
          <div class="mail-info-box">
            <div class="mail-icon"><i class="fas fa-envelope"></i></div>
            <div class="mail-details">
              <div class="mail-label">Mail</div>
              <div class="mail-address">XXX@yyy011.com</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <h6 class="footer-subscribe">Subscribe to Our Newsletter</h6>
          <form class="footer-subscribe-frm">
            <input type="email" class="subscribe-input" placeholder="Email Address">
            <button type="submit" class="btn-subscribe">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright &copy; Right Reserved by <strong>workland</strong></p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  @yield('scripts')
  <script>
    window.addEventListener("scroll", function () {
      const header = document.querySelector(".home-pageheadre");
      if (header) {
        header.classList.toggle("fixed", window.scrollY > 300);
      }
    });
  </script>
</body>
</html>
