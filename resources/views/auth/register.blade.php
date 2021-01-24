@extends('app')

@section('title', '新規登録 | VS-Connect')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    @include('error_list')
    <div class="login-form-container">
      <h2 class="login-form-title">新規登録</h2>
      <a href="/login/guest" class="btn btn-block btn-secondary mt-2">ゲストユーザーでログイン</a>
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
    <div class="social-list">
      <p class="top-messageText">SNSアカウントで登録</p>
      <div class="mt-4">
        <a href="{{ route('login.{provider}', ['provider' => 'facebook']) }}" class="social-item btn-primary"><i class="fab fa-facebook-f"></i></a>
        <a href="{{ route('login.{provider}', ['provider' => 'google']) }} " class="social-item btn-danger ml-2"><i class="fab fa-google"></i></a>
      </div> 
    </div>        
  </div>
</div>
@endsection