@extends('app')

@section('title', '募集一覧')

@section('content')
@include('nav')
@include('nav_tags')
@if (session('flash_message'))
<div class="flash_message card-text text-center alert alert-danger">
  {{ session('flash_message') }}
</div>
@endif
<div class="card-wrapper">
  <div class="container">
    @foreach($posts as $post)
    @include('posts.index_card')
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-4 pg-red">
    {{ $posts->links() }}
  </div>
</div>
@endsection