@extends('app')

@section('title', $post->title .'の記事詳細')

@section('content')
  @include('nav')
  <div class="card-wrapper">
    <div class="container">
      @include('posts.card')
      @include('posts.comment')
    </div>
  </div>
@endsection
