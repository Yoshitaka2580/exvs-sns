@extends('app')

@section('title', '更新')

@section('content')
@include('nav')
@include('nav_tags')
<div class="card-wrapper">
  <div class="container">
    <div class="card card-create">
      @include('error_list')
      <form method="POST" action="{{ route('posts.update',['post' => $post]) }}">
        @method('PATCH')
        @include('posts.form')
        <div class="form-btn">
          <a href="{{ route('posts.index') }}" class="btn btn-back">戻る</a>
          <button type="submit" class="btn btn-submit">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection