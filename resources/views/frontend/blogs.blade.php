@extends('layouts.frontend')

@section('title', 'Workland - Base North Blog')
@section('nav-blogs', 'active')

@section('content')

<section class="inner-bannerpart">
  <div class="container">
    <div class="about-header">
      <h1>Base North Blog</h1>
    </div>
  </div>
</section>

<section class="icelang-blog-part">
  <div class="container">
    <div class="base-north-content">
      <p>Base North is Workland's editorial space for work, life, and adventure in the North. Here you'll find practical guidance on working in Iceland, insights into the job market, and first-hand stories from people who have lived and worked in the region. The blog also features field reports, adventure accounts, and contributions from guides sharing their path into guiding and life on the island.</p>
    </div>
    <div class="row">
      @php
        $blogs = [
          ['img' => 'blog-1.jpg', 'date' => '22 JUN 2025', 'title' => 'Foot in the door', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it'],
          ['img' => 'blog-2.jpg', 'date' => '22 JUN 2025', 'title' => 'Who can work in Iceland?', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it'],
          ['img' => 'blog-3.jpg', 'date' => '22 JUN 2025', 'title' => 'Life on the island', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it'],
          ['img' => 'blog-4.jpg', 'date' => '22 JUN 2025', 'title' => 'Adventure awaits', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it'],
          ['img' => 'blog-5.jpg', 'date' => '22 JUN 2025', 'title' => 'Working in tourism', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it'],
        ];
      @endphp
      @foreach($blogs as $blog)
      <div class="col-lg-6">
        <div class="card border-0 custom-card-shadow custom-card-width">
          <div class="position-relative">
            <img src="{{ asset('assets/img/' . $blog['img']) }}" class="card-img-top rounded-4 custom-img-height" alt="{{ $blog['title'] }}">
            <div class="position-absolute bottom-0 start-0 custom-date-font">{{ $blog['date'] }}</div>
          </div>
          <div class="card-body px-0 pt-4 pb-0">
            <h2 class="card-title mb-3">{{ $blog['title'] }}</h2>
            <p class="card-text text-muted mb-4">{{ $blog['text'] }}</p>
            <a href="#" class="text-decoration-none d-flex align-items-center custom-link-color">
              Read more
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right ms-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
