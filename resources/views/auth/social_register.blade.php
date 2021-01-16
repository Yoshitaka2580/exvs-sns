@extends('app')

@section('title', '新規登録 | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    @include('error_list')
    <div class="card-text">
      <h2 class="card-title pb-1">新規登録</h2>
      <form method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="md-form">
          <label for="name">ユーザー名</label>
          <input class="form-control" type="text" id="name" name="name" required>
          <small class="card-text-p">登録後の変更はできません</small>
        </div>
        <div class="md-form">
          <label for="email">メールアドレス</label>
          <input class="form-control" type="text" id="email" name="email" value="{{ $email }}" disabled>
        </div>
        <div class="login-btn">
          <button class="btn btn-submit" type="submit">ユーザー登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
