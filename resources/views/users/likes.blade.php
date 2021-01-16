@extends('app')

@section('title', $user->name . 'さんのクリップ | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => true, 'hasFollowings' => false, 'hasFollowers' => false])

    @foreach($posts as $post)
      @include('posts.index_card')
    @endforeach
  </div>
</div>
  
@endsection
