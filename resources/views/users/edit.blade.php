@extends('app')

@section('title', $user->name . 'のプロフィール編集 | VS-Connect')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    <div class="card card-create">
    @include('error_list')
      <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('users.form')
        <div class="form-btn">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="btn btn-back">戻る</a>
          <button type="submit" class="btn btn-submit"><i class="fas fa-user-edit"></i> 更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
@include('footer')
@endsection
