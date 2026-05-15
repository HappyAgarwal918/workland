<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workland - Signup as Employer</title>
  <link href="{{ asset('mobile/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mobile/css/style.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="welcome-bar text-start">Welcome to Workland</div>
<div class="login-card text-center">
  <img src="{{ asset('mobile/img/login-img.png') }}" alt="Signup Illustration">
  <h5 class="mb-4 fw-semibold">Sign up as Employer</h5>

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden" name="role" value="employer">
    <div class="bottom-space text-start">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{ old('name') }}" required>
      @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="bottom-space text-start">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" value="{{ old('email') }}" required>
      @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3 text-start position-relative">
      <label class="form-label">Password</label>
      <div class="input-group1 position-relative">
        <input type="password" name="password" class="form-control" id="pwd1" placeholder="Enter Your Password">
        <button class="btn-outline-secondary1" type="button" id="togglePwd1"><i class="bi bi-eye"></i></button>
      </div>
      @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3 text-start position-relative">
      <label class="form-label">Confirm Password</label>
      <div class="input-group1 position-relative">
        <input type="password" name="password_confirmation" class="form-control" id="pwd2" placeholder="Confirm Your Password">
        <button class="btn-outline-secondary1" type="button" id="togglePwd2"><i class="bi bi-eye"></i></button>
      </div>
    </div>
    <button type="submit" class="btn-login">Sign Up</button>
    <p class="mt-4 mb-2 text-muted1">Already have an account? <a href="{{ route('employer.login') }}" class="signup-link">Login as Employer</a></p>
  </form>
</div>

<script src="{{ asset('mobile/js/bootstrap.min.js') }}"></script>
<script>
  ['1','2'].forEach(n => {
    document.getElementById('togglePwd'+n).addEventListener('click', function () {
      const pwd = document.getElementById('pwd'+n);
      const icon = this.querySelector('i');
      if (pwd.type === 'password') { pwd.type = 'text'; icon.classList.replace('bi-eye','bi-eye-slash'); }
      else { pwd.type = 'password'; icon.classList.replace('bi-eye-slash','bi-eye'); }
    });
  });
</script>
</body>
</html>
