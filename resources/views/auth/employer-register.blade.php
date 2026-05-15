@extends('layouts.frontend')

@section('title', 'Workland - Sign Up as Employer')

@section('content')

<section class="bg-sign-up">
  <div class="container">
    <h1>Sign up as Employer</h1>
    <div class="signup-inner">
      <form class="contact-row" method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" value="employer">
        <div class="row">
          <div class="col-lg-12">
            <div class="from-control">
              <label>Email Address</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" required>
              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="from-control">
              <label>Name</label>
              <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name" required>
              @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="from-control input-icon">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Your Password" id="pwd1">
              <img src="{{ asset('assets/img/pasword-vision.png') }}" class="input-pos-icon" id="togglePwd1" style="cursor:pointer">
              @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="from-control input-icon">
              <label>Confirm Password</label>
              <input type="password" name="password_confirmation" placeholder="Enter Your Confirm Password" id="pwd2">
              <img src="{{ asset('assets/img/pasword-vision.png') }}" class="input-pos-icon" id="togglePwd2" style="cursor:pointer">
            </div>
          </div>
          <div class="col-lg-12 text-center">
            <input type="submit" value="Sign up" class="sign-msg">
          </div>
        </div>
      </form>
      <div class="sign-other-way">
        <p>I already have an account. <a href="{{ route('employer.login') }}">Signin as Employer</a></p>
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
  ['1','2'].forEach(n => {
    document.getElementById('togglePwd'+n).addEventListener('click', function () {
      const pwd = document.getElementById('pwd'+n);
      pwd.type = pwd.type === 'password' ? 'text' : 'password';
    });
  });
</script>
@endsection
