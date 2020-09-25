@extends('app')

@section('title', 'VSマッチング')

@section('content')
@include('nav')
<!-- HOME -->
<main class="home">
  <div class="top-wrapper" id="home">
    <div class="container top-container">
      <h1 class="top-title">maxbooston matching<span class="element font-weight-bold" data-elements="Kerri Deo.,A Graphic Designer.,A Photographer."></span></h1>
      <div class="pt-2">
        <a href="#about" class="btn btn-about">Profile</a>
      </div>
    </div>
  </div>

  <div class="about-wrapper" id="about">
    <div class="container about-container">
      <h2 class="about-title">Profile</h2>
      <div class="about-content">
        <a class="profile-img">
          <img src="{{ asset('img/1045048.jpg') }}" class="profile-img-thumb">
        </a>
        <div class="profile-text">
          <h4 class="profile-name">Yoshitaka Nakashima</h4>
          <p class="mt-4">よろしくお願いします。</p>
          <div class="mt-4">
            <a href="https://www.facebook.com/yositaka.nakasima.3" class="social-item"><i class="fab fa-facebook-f"></i></a>
            <a href="https://github.com/Yoshitaka2580" class="social-item"><i class="fab fa-github-square"></i></a>
          </div> 
        </div>
      </div>
    </div>
  </div>
</main>
@endsection