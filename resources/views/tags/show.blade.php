@extends('app')

@section('title', $tag->hashtag)

@section('content')
@include('nav')
@include('nav_tags')
<div class="container">
  <div class="card">
    <h2 class="card-title-tag">{{ $tag->hashtag }}</h2>
    @if ($tag->posts->count() === 0)
    <p class="tag-count">
      タグはありません
    </p>
    @else
    <p class="tag-count">
      {{ $tag->posts->count() }}件見つかりました
    </p>
    @endif
  </div>
  @foreach($tag->posts as $post)
    @include('posts.index_card')
  @endforeach
</div>
@endsection