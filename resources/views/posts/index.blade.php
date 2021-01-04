@extends('app')

@section('title', '募集一覧')

@section('content')
@include('nav')
<nav class="tags-nav">
  <div class="cost-wrapper">
    <div class="container cost-container">
      <ul class="cost-category">
        <li>
          <a href="{{ route('posts.index') }}"><img src="img/exvs-sns-image/cost_all_on.png" alt="" class="cost-item"></a>
        </li>
        <li>
          <a href="{{ route('posts.index', ['category_id'=>1]) }}" title="{{ 3000 }}"><img src="img/exvs-sns-image/cost3000_on.png" alt="" class="cost-item"></a>
        </li>
        <li>
          <a href="{{ route('posts.index', ['category_id'=>2]) }}" title="{{ 2500 }}"><img src="img/exvs-sns-image/cost2500_on.png" alt="" class="cost-item"></a>
        </li>
        <li>
          <a href="{{ route('posts.index', ['category_id'=>3]) }}" title="{{ 2000 }}"><img src="img/exvs-sns-image/cost2000_on.png" alt="" class="cost-item"></a>
        </li>
        <li>
          <a href="{{ route('posts.index', ['category_id'=>4]) }}" title="{{ 1500 }}"><img src="img/exvs-sns-image/cost1500_on.png" alt="" class="cost-item"></a>
        </li>
        <form action="/search" method="get" class="input-group md-form form-sm form-2 pl-0">
          <input type="search" name="search" required class="form-control my-0 py-1 red-border" placeholder="タグを検索" style="color: #fff;">
          <button type="submit" class="input-group-text red lighten-3"><i class="fas fa-search text-grey"></i></button>
        </form>
      </ul>
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