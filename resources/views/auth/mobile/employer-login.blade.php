<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workland - Login as Employer</title>
  <link href="{{ asset('mobile/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mobile/css/style.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="welcome-bar text-start">Welcome to Workland</div>
<div class="login-card text-center">
  <img src="{{ asset('mobile/img/login-img.png') }}" alt="Login Illustration">
  <h5 class="mb-4 fw-semibold">Log in as Employer</h5>

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="bottom-space text-start">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" value="{{ old('email') }}" required>
      @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3 text-start position-relative">
      <label class="form-label">Password</label>
      <div class="input-group1 position-relative">
        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Enter Your Password">
        <button class="btn-outline-secondary1" type="button" id="togglePassword">
          <i class="bi bi-eye"></i>
        </button>
      </div>
    </div>
    <div class="bottom-space text-end mb-3">
      <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password</a>
    </div>
    <button type="submit" class="btn-login">Login</button>
    <p class="mt-4 mb-2 text-muted1">I haven't got an account? <a href="{{ route('employer.register') }}" class="signup-link">Signup as Employer</a></p>
    <p>or</p>
    <p class="text-muted1">Sign in with</p>
    <div class="social-login">
      <a href="#" target="_blank"><img src="{{ asset('mobile/img/google.png') }}" alt="Google"></a>
      <a href="#" target="_blank"><img src="{{ asset('mobile/img/facebook.png') }}" alt="Facebook"></a>
      <a href="#" target="_blank"><img src="{{ asset('mobile/img/mac.png') }}" alt="Apple"></a>
    </div>
  </form>
</div>

<script src="{{ asset('mobile/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('mobile/js/jquery-3.7.1.min.js') }}"></script>
<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('passwordInput');
    const icon = this.querySelector('i');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
      passwordInput.type = 'password';
      icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
  });
</script>
</body>
</html>
