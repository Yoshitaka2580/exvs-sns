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
        <h1 class="top-title">VS-Connect</h1>
        <p class="top-titleMessage">全国のプレイヤーと繋がって一緒に強くなろう！</p>
        <div class="top-messageBorder"></div>
        <p class="top-messageText">VS-Connectは「機動戦士ガンダム マキシブーストONのコミュニティサイト」</p>
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

  <div class="wrapper about-wrapper" id="about">
    <div class="container">
      <h2 class="contant-title">VS-Connectとは</h2>
      <div class="about-content">
        <p class="about-text">Playstation4ソフト「機動戦士ガンダム マキシブーストON」のコミュニティサイトです。<br>
      一緒にタッグを組んだり、ルームを結成して仲間を作りマキブオンを楽しみましょう。
        </p>
      </div>
    </div>
  </div>

  <!-- <div class="wrapper tutorial-wrapper">
    <div class="container">
    <h2 class="contant-title">VS-Connectの使い方</h2>
    <div class="tutorials">
      <div class="tutorial">
        <div class="row">
          <div class="col-2">.
            <img src="{{ asset('img/記事アイコン1.jpeg') }}" class="">
          </div>
          <div class="col-10">.
            <h3></h3>
            <p></p>
          </div>
          <div class="col-2">.
            <img src="{{ asset('img/検索アイコン1.jpeg') }}" class="">
          </div>
          <div class="col-10">.
            <h3></h3>
            <p></p>
          </div>
          <div class="col-2">.
            <img src="{{ asset('img/コミュニケーションアイコン3.jpeg') }}" class="">
          </div>
          <div class="col-10">.
            <h3></h3>
            <p></p>
          </div>
          <div class="col-2">.
            <img src="{{ asset('img/フリーのクリップアイコン.jpeg') }}" class="">
          </div>
          <div class="col-10">.
            <h3></h3>
            <p></p>
          </div>
          <div class="col-2">.
            <img src="{{ asset('img/登録アイコン.jpeg') }}" class="">
          </div>
          <div class="col-10">.
            <h3></h3>
            <p></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div> -->
</main>
@endsection