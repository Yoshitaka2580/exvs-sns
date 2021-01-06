@extends('app')

@section('title', '募集一覧')

@section('content')
@include('nav')
<nav class="cost-wrapper">
  <div class="container">
    <ul class="cost-category">
      <li>
        <a href="{{ route('posts.index') }}"><img src="img/exvs-sns-image/cost_all_on.png" class="cost-item"></a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>1]) }}" title="{{ 3000 }}"><img src="img/exvs-sns-image/cost3000_on.png" class="cost-item"></a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>2]) }}" title="{{ 2500 }}"><img src="img/exvs-sns-image/cost2500_on.png" class="cost-item"></a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>3]) }}" title="{{ 2000 }}"><img src="img/exvs-sns-image/cost2000_on.png" class="cost-item"></a>
      </li>
      <li>
        <a href="{{ route('posts.index', ['category_id'=>4]) }}" title="{{ 1500 }}"><img src="img/exvs-sns-image/cost1500_on.png" class="cost-item"></a>
      </li>
    </ul>
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