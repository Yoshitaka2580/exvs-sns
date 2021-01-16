@extends('app')

@section('title', 'パスワード再設定 | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    <h2 class="card-title pb-1">新しいパスワードを設定</h2>
    @include('error_list')
    <div class="card-text">
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="md-form">
          <label for="password">新しいパスワード</label>
          <input class="form-control" type="password" id="password" name="password" required style="color: #fff;">
        </div>
        <div class="md-form">
          <label for="password_confirmation">新しいパスワード(再入力)</label>
          <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required style="color: #fff;">
        </div>
        <div class="login-btn">
        <button class="btn btn-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
