@extends('app')

@section('title', $post->title .'| VS-Connect')

@section('content')
  @include('nav')
  <div class="card-wrapper">
    <div class="container show-container">
      @include('posts.card')
      @include('posts.comment')
    </div>
  </div>
@endsection
