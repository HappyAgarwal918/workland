@extends('layouts.frontend')

@section('title', 'Workland - Home Page')
@section('nav-home', 'active')

@section('content')

<section class="main-banner">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/workland-banner.jpg') }}');">
        <div class="slide-content">
          <h1>Your Icelandic Adventure Starts Here</h1>
          <p>Work, explore, and connect — whether you're already in Iceland or dreaming of getting here.</p>
        </div>
      </div>
      <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/workland-banner.jpg') }}');">
        <div class="slide-content">
          <h1>Discover Hidden Landscapes</h1>
          <p>Explore glaciers, waterfalls, and unique places that make Iceland magical.</p>
        </div>
      </div>
      <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/workland-banner.jpg') }}');">
        <div class="slide-content">
          <h1>Connect with Nature</h1>
          <p>Experience the northern lights, volcanoes, and breathtaking adventures.</p>
        </div>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<section class="about-part">
  <div class="container">
    <div class="about-part-ineer">
      <h1>Introduction to Workland</h1>
      <p>Workland is your gateway to working in Iceland's tourism and hospitality industries. Whether you're a seasoned guide looking for your next season, or someone dreaming of adventure in one of the world's most breathtaking countries, you're in the right place.</p>
    </div>
  </div>
</section>

<section class="feature-part">
  <div class="container">
    <div class="feature-head"><h1>FEATURES</h1></div>
    <div class="row">
      <div class="col-lg-6">
        <div class="feature-card">
          <div class="card-icon-wrapper"><img src="{{ asset('assets/img/feature-1.png') }}" alt=""></div>
          <h2 class="card-title">Explore Opportunities</h2>
          <p class="card-description">Find job opportunities and connect with operators and companies across Iceland.</p>
          <a href="#" class="card-button">Let's Connect</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="feature-card">
          <div class="card-icon-wrapper"><img src="{{ asset('assets/img/feature-2.png') }}" alt=""></div>
          <h2 class="card-title">Find Your Team</h2>
          <p class="card-description">Hire passionate, skilled staff — quickly, easily, and all in one place.</p>
          <a href="#" class="card-button">Let's Connect</a>
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
          <h1>Why Should you Sign up</h1>
          <p>This platform was born from a deep understanding of Iceland's unique tourism landscape and a passion for connecting people. Having spent nearly a decade immersed in Iceland's dynamic tourism industry, I've witnessed firsthand the incredible potential that arises when diverse talents meet the right opportunities.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="why-img"><img src="{{ asset('assets/img/why-img.png') }}" alt=""></div>
      </div>
    </div>
  </div>
</section>

<section class="short-part">
  <div class="container">
    <div class="short-haed"><h1>Short Value Propositions</h1></div>
    <div class="row">
      <div class="col-md-4">
        <div class="short-box dark">
          <div class="sh-box dark">No fee to signup</div>
          <div class="arrow-icon"><a href="#"><img src="{{ asset('assets/img/arrow.png') }}" alt=""></a></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="short-box light">
          <div class="sh-box dark">Smart, simple matching for jobs and staff</div>
          <div class="arrow-icon"><a href="#"><img src="{{ asset('assets/img/arrow-dark.png') }}" alt=""></a></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="short-box light">
          <div class="sh-box dark w-100">Built by people who work and understand tourism in Iceland</div>
        </div>
      </div>
    </div>
    <a href="#" class="card-button">Let's Connect</a>
  </div>
</section>

<section class="faq-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="short-haed"><h1>Frequently Asked Questions</h1></div>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item mb-3">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">What is Workland?</button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Workland is a platform designed to connect people and businesses through meaningful work in Iceland, with a clear focus on the tourism and hospitality sectors.</div>
            </div>
          </div>
          <div class="accordion-item mb-3">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">How do I create an account?</button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">You can sign up as an Employer or Guide using the Sign Up button in the navigation menu. Registration is free for job seekers.</div>
            </div>
          </div>
          <div class="accordion-item mb-3">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Is customer support available?</button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Yes, you can reach us through the Contact Us page and we'll get back to you as soon as possible.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Can I cancel my subscription?</button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Yes, you can cancel your subscription at any time through your account settings.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="map-inner-part">
  <div class="map-img">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d436631.965486268!2d-17.59303479163098!3d64.69184512903408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48d22b52a3eb6043%3A0x6f8a0434e5c1459a!2sIceland!5e0!3m2!1sen!2sin!4v1770619496448!5m2!1sen!2sin" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="map-list">
    <ul>
      <li><a href="#">Operating Season</a></li>
      <li><a href="#">Company size</a></li>
      <li><a href="#">Location</a></li>
      <li><a href="#">Company language</a></li>
      <li><a href="#">License Requirements</a></li>
      <li><a href="#">Type of tours</a></li>
      <li><a href="#">Available Roles</a></li>
      <li><a href="#">Contract type</a></li>
    </ul>
  </div>
</section>

@endsection

@section('scripts')
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  });
</script>
@endsection
