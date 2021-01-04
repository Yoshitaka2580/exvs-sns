@extends('app')

@section('title', $user->name . 'さんのお気に入り')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => true])

    @foreach($posts as $post)
      @include('posts.card')
    @endforeach
  </div>
</div>
  
@endsection
