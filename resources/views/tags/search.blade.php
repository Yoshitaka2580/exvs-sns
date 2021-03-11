@extends('app')
@section('title', $search . 'に関する募集| VS-Connect')
@section('content')
    @include('nav')
    <div class="card-wrapper">
        <div class="container">
            <div class="card card-hashtag">
                <h5 class="card-title-tag">「{{ $search }}」の検索結果{{ $tags->count() }}件</h5>
            </div>
            @foreach ($tags as $tagKey => $tagName)
                @foreach ($tagName->posts as $post)
                    @include('posts.index_card')
                @endforeach
            @endforeach
        </div>
    </div>
    @include('footer')
@endsection
