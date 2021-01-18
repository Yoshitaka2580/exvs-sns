@extends('app')

@section('title', $post->title .'| VS-Conn')

@section('content')
  @include('nav')
  <div class="card-wrapper">
    <div class="container show-container">
      @include('posts.card')
      @include('posts.comment')
    </div>
  </div>
@endsection
