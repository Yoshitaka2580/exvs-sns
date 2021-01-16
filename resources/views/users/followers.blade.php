@extends('app')

@section('title', $user->name . 'さんのフォロワー | VS-Conn')

@section('content')
@include('nav')
<div class="card-wrapper">
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false, 'hasFollowings' => false, 'hasFollowers' => true])

    @empty($followers->count())
    <h5 class="text-center mt-2">フォローされている人はいません</h5>
    @else
    @foreach($followers as $person)
    @include('users.person')
    @endforeach
    @endempty
  </div>
</div>
@endsection