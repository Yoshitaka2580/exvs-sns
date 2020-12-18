@extends('app')

@section('title', '募集一覧')

@section('content')
@include('nav')
<nav class="tags-nav">
  <div class="cost-wrapper">
    <div class="container cost-container">
      <div class="cost-item">
        <a class="cost-link btn-backred" href="{{ route('posts.index') }}">All</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 3000]) }}">3000</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 2500]) }}">2500</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 2000]) }}">2000</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 1500]) }}">1500</a>
        <form action="/search" method="get">
          <input type="search" name="search" required class="tagInput" placeholder="タグを検索">
          <button type="submit" class="btn-search btn-backred"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</nav>
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