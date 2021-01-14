@extends('app')

@section('title', 'ログインフォーム')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    @include('error_list')
    <div class="card-text">
      <h2 class="card-title pb-1">ログイン</h2>
      <a href="/login/guest" class="btn btn-block btn-secondary mt-2">ゲストユーザーでログイン</a>
      <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger mt-2">
        <i class="fab fa-google mr-1"></i>Googleでログイン
      </a>
      <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary mt-2">
        <i class="fab fa-facebook-f mr-1"></i>Facebookでログイン
      </a>
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
  </div>
</div>
@endsection