@extends('app')

@section('title', '相方募集する')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    <div class="card card-create">
      @include('error_list')
      <form method="POST" action="{{ route('posts.store') }}">
        @include('posts.form')
        <div class="form-btn">
          <a href="{{ route('posts.index') }}" class="btn btn-back">戻る</a>
          <button type="submit" class="btn btn-submit">投稿</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection