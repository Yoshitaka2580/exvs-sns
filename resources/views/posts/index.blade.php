@extends('app')

@section('title', '募集一覧')

@section('content')
@include('nav')
<nav class="tags-nav">
  <div class="cost-wrapper">
    <div class="container cost-container">
      <div class="cost-item">
        <span class="btn"><a href="{{ route('posts.index') }}">All</a></span>
        @foreach($categories as $id => $name)
        <span class="btn"><a href="{{ route('posts.index', ['category_id'=>$id]) }}" title="{{ $name }}">{{ $name }}</a></span>
        @endforeach
        <form action="/search" method="get" class="input-group md-form form-sm form-2 pl-0">
          <input type="search" name="search" required class="form-control my-0 py-1 red-border" placeholder="タグを検索" style="color: #fff;">
          <button type="submit" class="input-group-text red lighten-3"><i class="fas fa-search text-grey"></i></button>
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

  <div class="d-flex justify-content-center mb-5">
    {{ $posts->appends(['category_id' => $category_id])->links() }}
  </div>
</div>
@endsection