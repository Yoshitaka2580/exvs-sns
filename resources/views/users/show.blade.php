@extends('app')

@section('title', $user->name . 'さん')

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@include('nav')
<div class="card-wrapper">
  <div class="container">
  @include('users.user')
  @include('users.tabs', ['hasPosts' => true, 'hasLikes' => false, 'hasFollowings' => false, 'hasFollowers' => false])

  @foreach($posts as $post)
    @include('posts.index_card')
  @endforeach
  </div>
</div>
@endsection