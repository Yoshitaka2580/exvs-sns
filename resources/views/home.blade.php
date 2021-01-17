@extends('app')

@section('title', 'VS-Conn')

@section('content')
@include('nav')
<!-- HOME -->
<main class="home">
  <div class="top-wrapper" id="home">
    <img class="top-background-img" src="{{ asset('img/jeshoots-com-eCktzGjC-iU-unsplash.jpg') }}">
    <div class="container top-container">
      <div class="top-messageBox">
        <h1 class="top-title">VS-Conn</h1>
        <p class="top-titleMessage">全国のプレイヤーと繋がって一緒に強くなろう！</p>
        <div class="top-messageBorder"></div>
        <p class="top-messageText">VS-Connは機動戦士ガンダム マキシブーストONのコミュニティサイトです</p>
      </div>
      <div class="top-login">
        <a href="/login/guest" class="btn btn-secondary mt-2">ゲストユーザーでログイン</a>
        <a href="{{ route('register') }}" class="btn btn-primary mt-2">メールアドレスで登録</a>
        <div class="top-messageBorder"></div>
        <div class="social-list">
          <p class="top-messageText">SNSアカウントで登録</p>
          <div class="mt-4">
            <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="social-item btn-primary"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ route('login.{provider}', ['provider' => 'google']) }} " class="social-item btn-danger ml-2"><i class="fab fa-google"></i></a>
            <p class="top-messageText">アカウントお持ちの方は<a href="{{ route('login') }}" class="messageText-login">こちらからログイン</a></p>
          </div> 
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
        </div>
      </div>
    </div>
  </div>
</main>
@endsection