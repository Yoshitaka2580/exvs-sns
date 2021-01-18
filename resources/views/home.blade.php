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
        <p class="top-messageText">VS-Connectは機動戦士ガンダム マキシブーストONのコミュニティサイト</p>
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
  </div>

  <div class="wrapper about-wrapper" id="about">
    <div class="container">
      <h2 class="contant-title">VS-Connectとは</h2>
      <div class="about-content">
        <p class="about-text">PlayStation4ソフト「機動戦士ガンダム マキシブーストON」のコミュニティサイトです。<br>
      一緒にタッグを組んだり、ルームを結成する仲間を集めてマキブオンを楽しみましょう。
        </p>
      </div>
    </div>
  </div>

  <div class="wrapper tutorial-wrapper">
    <div class="container">
      <h2 class="contant-title">VS-Connectの使い方</h2>
      <div class="tutorials col-md-8">
        <div class="tutorial">
          <div class="row">
            <div class="col-2 tutorial-iconBorder">
              <img src="{{ asset('img/記事アイコン1.jpeg') }}" class="tutorial-icon">
            </div>
            <div class="col-10">
              <h3>募集をかける</h3>
              <p>自分の機体のコストや機体名など詳細内容を書いて仲間を募集しよう</p>
            </div>
          </div>
        </div>
        <div class="tutorial">
          <div class="row">
            <div class="col-2 tutorial-iconBorder">
              <img src="{{ asset('img/検索アイコン1.jpeg') }}" class="tutorial-icon">
            </div>
            <div class="col-10">
              <h3>仲間を見つける</h3>
              <p>自分の条件に合った投稿があるか検索してみよう</p>
            </div>
          </div>
        </div>
        <div class="tutorial">
          <div class="row">
            <div class="col-2 tutorial-iconBorder">
              <img src="{{ asset('img/コミュニケーションアイコン3.jpeg') }}" class="tutorial-icon">
            </div>
            <div class="col-10">
              <h3>コメントする</h3>
              <p>条件が合ったらマッチできるか積極的に声をかけてみよう</p>
            </div>
          </div>
        </div>
        <div class="tutorial">
          <div class="row">
            <div class="col-2 tutorial-iconBorder">
              <img src="{{ asset('img/フリーのクリップアイコン.jpeg') }}" class="tutorial-icon">
            </div>
            <div class="col-10">
              <h3>保存する</h3>
              <p>気になった投稿があればクリップボタンで保存しよう</p>
            </div>          
          </div>
        </div>
        <div class="tutorial">
          <div class="row">
            <div class="col-2 tutorial-iconBorder">
              <img src="{{ asset('img/登録アイコン.jpeg') }}" class="tutorial-icon">
            </div>
            <div class="col-10">
              <h3>ユーザーフォロー</h3>
              <p>お気に入りのユーザーがいればフォローしよう</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@include('footer')
@endsection