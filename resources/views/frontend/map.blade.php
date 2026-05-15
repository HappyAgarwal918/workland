@extends('layouts.frontend')

@section('title', 'Workland - Map')
@section('nav-map', 'active')

@section('content')

<section class="map-inner-part">
  <div class="map-img">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d436631.965486268!2d-17.59303479163098!3d64.69184512903408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48d22b52a3eb6043%3A0x6f8a0434e5c1459a!2sIceland!5e0!3m2!1sen!2sin!4v1770619496448!5m2!1sen!2sin"
      width="100%" height="750" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
