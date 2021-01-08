@extends('app')

@section('title', $user->name . 'さんのフォロー')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false])

    @foreach($followings as $person)
      @include('users.person')
    @endforeach
  </div>
</div>

@endsection