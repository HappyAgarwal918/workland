@extends('layouts.frontend')

@section('title', 'Workland - Login as Employer')

@section('content')

<section class="bg-sign-up">
  <div class="container">
    <h1>Sign in as Employer</h1>
    <div class="signup-inner">
      <form class="contact-row" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="from-control">
              <label>Email Address</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" required>
              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="from-control input-icon">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Your Password">
              <img src="{{ asset('assets/img/pasword-vision.png') }}" class="input-pos-icon" id="togglePwd" style="cursor:pointer">
            </div>
          </div>
          <div class="col-lg-12 text-end mb-2">
            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
          </div>
          <div class="col-lg-12 text-center">
            <input type="submit" value="Login" class="sign-msg">
          </div>
        </div>
      </form>
      <div class="sign-other-way">
        <p>I don't have an account. <a href="{{ route('employer.register') }}">Signup as Employer</a></p>
        <p>or Sign in with</p>
        <div class="sign-with-social">
          <a href="#" target="_blank"><img src="{{ asset('assets/img/google.png') }}" alt="Google"></a>
          <a href="#" target="_blank"><img src="{{ asset('assets/img/facebook.png') }}" alt="Facebook"></a>
          <a href="#" target="_blank"><img src="{{ asset('assets/img/mac.png') }}" alt="Apple"></a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
  document.getElementById('togglePwd').addEventListener('click', function () {
    const pwd = this.previousElementSibling;
    pwd.type = pwd.type === 'password' ? 'text' : 'password';
  });
</script>
@endsection
