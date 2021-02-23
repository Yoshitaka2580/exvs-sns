@extends('app')

@section('title', 'ログイン | VS-Connect')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    <div class="card login-form">
      @include('error_list')
      <div class="login-form-container">
        <h2 class="login-form-title">ログイン</h2>
        <a href="/login/guest" class="btn btn-block btn-secondary mt-2">ゲストユーザーでログイン</a>
        <form action="{{ route('login') }}" method="POST" class="mt-3">
          @csrf
          <div class="md-form">
            <label for="email" class="active">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
          </div>

          <div class="md-form">
            <label for="password" class="active">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <input type="hidden" name="remember" id="remember" value="on">

          <div class="text-left">
            <a href="{{ route('password.request') }}" class="card-text-p">パスワードを忘れた方</a>
          </div>

          <div class="login-btn">
            <button type="submit" class="btn btn-submit">ログイン</button>
            <div class="mt-1">
              <a href="{{ route('register') }}" class="card-text-p">新規登録はこちら</a>
            </div>
          </div>
        </form>
      </div>
      <div class="social-list">
        <p class="top-messageText">SNSアカウントでログイン</p>
        <div class="mt-4">
          <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="social-item btn-primary"><i class="fab fa-facebook-f"></i></a>
          <a href="{{ route('login.{provider}', ['provider' => 'google']) }} " class="social-item btn-danger ml-2"><i class="fab fa-google"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')
@endsection
