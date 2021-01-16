@extends('app')

@section('title', $user->name . 'さんのフォロー | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false, 'hasFollowings' => true, 'hasFollowers' => false])
    
    @empty($followings->count())
    <h5 class="text-center mt-2">フォローしている人はいません</h5>
    @else
    @foreach($followings as $person)
    @include('users.person')
    @endforeach
    @endempty
  </div>
</div>

@endsection