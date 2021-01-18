@extends('app')

@section('title', 'パスワード再設定 | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="card login-form">
    <h2 class="login-form-title">パスワード再設定</h2>
    @include('error_list')
    @if (session('status'))
      <div class="card-text alert alert-success">
        {{ session('status') }}
      </div>
    @endif
    <div class="card-text">
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="md-form">
          <label for="email">メールアドレス</label>
          <input class="form-control" type="text" id="email" name="email" required style="color: #fff;">
        </div>
        <div class="login-btn">
          <button class="btn btn-submit" type="submit">メール送信</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
