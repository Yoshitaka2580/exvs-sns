@extends('app')

@section('title', $post->title .'の記事詳細')

@section('content')
  @include('nav')
  <div class="container">
    @include('posts.card')
    @include('posts.comment')
  </div>
@endsection
