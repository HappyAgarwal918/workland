@extends('layouts.frontend')

@section('title', 'Workland - Pricing')
@section('nav-pricing', 'active')

@section('content')

<section class="inner-bannerpart">
  <div class="container">
    <div class="about-header">
      <nav class="breadcrumb">
        <a href="{{ route('home') }}">Home</a> &gt;&gt; Pricing
      </nav>
      <h1>Pricing</h1>
    </div>
  </div>
</section>

<section class="about-us">
  <div class="container">
    <h1>Pricing for Organisations and Employers</h1>
    <p class="contact-get-para">Access to Workland is free for job seekers.</p>
    <p class="contact-get-para">Companies and operators pay an annual subscription fee, determined by the number of operational bases they have in Iceland.</p>
  </div>
</section>

<section class="pricing-form-part">
  <div class="container">
    <h3>Annual Subscription for Companies &amp; Operators</h3>
    <div class="pricingrow">
      <div class="pricing-col">
        <div class="pricing-col-inner">
          <p>(Single-Base Operator)</p>
          <h2>ISK <span>14,900</span> per year</h2>
          <a href="{{ route('employer.register') }}" class="sub-btn">Subscribe Now</a>
        </div>
      </div>
      <div class="pricing-col">
        <div class="pricing-col-inner">
          <p>Multiple-Base Operator</p>
          <h2>ISK <span>24,900</span> per year</h2>
          <a href="{{ route('employer.register') }}" class="sub-btn">Subscribe Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
