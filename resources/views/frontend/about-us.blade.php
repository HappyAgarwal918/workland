@extends('layouts.frontend')

@section('title', 'Workland - About Us')
@section('nav-about', 'active')

@section('content')

<section class="inner-bannerpart">
  <div class="container">
    <div class="about-header">
      <nav class="breadcrumb">
        <a href="{{ route('home') }}">Home</a> &gt;&gt; About us
      </nav>
      <h1>About us</h1>
    </div>
  </div>
</section>

<section class="about-us">
  <div class="container">
    <h1>Our Story:</h1>
    <p>Connecting Dreams with Opportunities in Iceland</p>
  </div>
</section>

<section class="why-part">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="why-img"><img src="{{ asset('assets/img/about-img.jpg') }}" alt=""></div>
      </div>
      <div class="col-lg-6">
        <div class="why-head">
          <h1 class="mb-0">About Workland Iceland</h1>
          <p class="pb-0">Workland is a platform designed to connect people and businesses through meaningful work in Iceland — with a clear focus on the tourism and hospitality sectors.</p>
          <p>Iceland's labour market depends heavily on international talent, particularly in seasonal and specialised roles. At the same time, many people around the world are seeking more than just a job — they are looking for work that offers experience, stability, and a sense of purpose. Workland exists at the intersection of these needs.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="why-part">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="why-head">
          <h1>Why Iceland</h1>
          <p class="pb-0">Iceland offers a unique working environment: a strong economy, high standards, and a tourism industry that depends on skilled, motivated people from diverse backgrounds. Entering the Icelandic job market, however, can be complex. Employers often struggle to find reliable staff, while workers lack clear information about roles, requirements, and life in Iceland.</p>
          <p>Workland bridges this gap by making the process clearer, more accessible, and more efficient for both sides — helping people and companies find the right match faster.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="why-img"><img src="{{ asset('assets/img/choose.png') }}" alt=""></div>
      </div>
    </div>
  </div>
</section>

<section class="why-part with-bg-about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="why-img"><img src="{{ asset('assets/img/role-img.png') }}" alt=""></div>
      </div>
      <div class="col-lg-6">
        <div class="why-head">
          <h1 class="black-color">Our Role</h1>
          <p class="pb-2">Workland acts as a practical link between employers and workers.</p>
          <p class="pb-2 pt-0">For employers, the platform simplifies recruitment by providing access to an international talent pool and smart filters that make it easy to identify candidates based on skills, experience, language, and background — reducing hiring time and improving match quality.</p>
          <p class="pb-2 pt-0">For workers, Workland brings job opportunities and essential information together in one place. Through clear listings and filters based on language, skills, and preferences, individuals can quickly find roles that suit their profile and understand what to expect before and after arriving in Iceland.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="why-part">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="why-head">
          <h1>What We Aim to Solve</h1>
          <ul class="aim-solve">
            <li>Shortages of skilled and seasonal staff in tourism and hospitality</li>
            <li>Inefficient and costly recruitment processes for small and mid-sized companies</li>
            <li>Lack of clear, reliable information for people seeking work in Iceland</li>
          </ul>
          <p>By addressing these challenges, Workland supports a more sustainable labour market — where businesses can hire with confidence and individuals can find work that aligns with their skills, background, and goals.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="why-img"><img src="{{ asset('assets/img/aim-img.jpg') }}" alt=""></div>
      </div>
    </div>
  </div>
</section>

@endsection
