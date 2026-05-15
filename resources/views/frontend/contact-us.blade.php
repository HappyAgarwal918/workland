@extends('layouts.frontend')

@section('title', 'Workland - Contact Us')
@section('nav-contact', 'active')

@section('content')

<section class="inner-bannerpart">
  <div class="container">
    <div class="about-header">
      <nav class="breadcrumb">
        <a href="{{ route('home') }}">Home</a> &gt;&gt; Contact Us
      </nav>
      <h1>Contact Us</h1>
    </div>
  </div>
</section>

<section class="about-us">
  <div class="container">
    <h1>Get in Touch</h1>
    <p class="contact-get-para">Have a question, run into an issue, or want to share an idea or suggestion? Whether you're a job seeker, an employer, or simply want to learn more about Workland, you're always welcome to reach out. Use the contact form below and we'll get back to you as soon as possible.</p>
  </div>
</section>

<section class="contact-form-part">
  <div class="container">
    <div class="contact-frm-inner">
      <form class="contact-row" method="POST" action="#">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="from-control">
              <label>First Name</label>
              <input type="text" name="first_name" placeholder="Enter Your First Name">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="from-control">
              <label>Last Name</label>
              <input type="text" name="last_name" placeholder="Enter Your Last Name">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="from-control">
              <label>Email Address</label>
              <input type="email" name="email" placeholder="Enter Your Email Address">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="from-control">
              <label>Phone Number</label>
              <input type="tel" name="phone" placeholder="Enter Your Phone Number">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="from-control">
              <label>Message</label>
              <textarea name="message" placeholder="Write Your Message Here" rows="5"></textarea>
            </div>
          </div>
          <div class="col-lg-12 text-center">
            <input type="submit" value="Send Message" class="sign-msg">
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
