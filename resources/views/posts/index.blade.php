@extends('app')

@section('title', '投稿一覧 | VS-Conn')

@section('content')
@include('nav')
<nav class="cost-wrapper">
  <div class="container">
    <ul class="cost-category">
      <li>
        <a href="{{ route('posts.index') }}" class="cost-item cost-all ml-0">cost All</a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>1]) }}" title="{{ 3000 }}" class="cost-item cost-3000">cost 3000</a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>2]) }}" title="{{ 2500 }}" class="cost-item cost-2500">cost 2500</a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>3]) }}" title="{{ 2000 }}" class="cost-item cost-2000">cost 2000</a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>4]) }}" title="{{ 1500 }}" class="cost-item cost-1500">cost 1500</a>
      </li>
    </ul>
  </div>
</nav>
@if (session('flash_message'))
<div class="flash_message card-text text-center alert alert-danger" role="alert">
  {{ session('flash_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="mt-4">
  <div class="container">
    @empty($posts->total())
    <h5>投稿はありません</h5>
    @else
    <h5>{{ $posts->total() }}件の投稿</h5>
    @endempty

    @foreach($posts as $post)
    @include('posts.index_card')
    @endforeach
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $posts->appends(['category_id' => $category_id])->links() }}
  </div>
</div>
@endsection