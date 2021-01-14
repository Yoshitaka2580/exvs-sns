@extends('app')

@section('title', '新規登録')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    @include('error_list')
    <div class="card-text">
      <h2 class="card-title">新規登録</h2>
      <a href="/login/guest" class="btn btn-block btn-secondary mt-2">ゲストユーザーでログイン</a>
      <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger mt-2">
        <i class="fab fa-google mr-1"></i>Googleで登録
      </a>
      <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary mt-2">
        <i class="fab fa-facebook-f mr-1"></i>Facebookで登録
      </a>
      <form method="POST" action="{{ route('register') }}" class="mt-3">
        @csrf
        <div class="md-form">
          <label for="name">ユーザー名</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
          <small>登録後の変更はできません</small>
        </div>
        <div class="md-form">
          <label for="email">メールアドレス</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="md-form">
          <label for="password">パスワード</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="md-form">
          <label for="password_confirmation">パスワード確認</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="login-btn">
          <button type="submit" class="btn btn-submit">アカウント作成</button>
          <div class="mt-1">
            <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
          </div>
        </div>
      </form>
    </div>         
  </div>
</div>
@endsection