@extends('app')

@section('title', 'VS-Conn')

@section('content')
@include('nav')
<!-- HOME -->
<main class="home">
  <div class="top-wrapper" id="home">
    <img class="top-background-img" src="{{ asset('img/jeshoots-com-eCktzGjC-iU-unsplash.jpg') }}">
    <div class="container top-container">
      <div class="top-titlebox">
        <h1 class="top-title">VS-Conn</h1>
      </div>
      <a href="/login/guest" class="btn btn-secondary mt-2">ゲストユーザーでログイン</a>
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