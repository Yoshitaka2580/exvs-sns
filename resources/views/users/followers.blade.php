@extends('app')

@section('title', $user->name . 'さんのフォロワー')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false])

    @foreach($followers as $person)
      @include('users.person')
    @endforeach
  </div>
</div>

@endsection