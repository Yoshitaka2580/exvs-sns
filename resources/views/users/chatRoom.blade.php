@extends('app')

@section('content')
    @include('nav')
    <div class="card-wrapper">
        <div class="matchingPage">
            <header class="header">
                <i class="fas fa-comments fa-3x"></i>
            </header>
            <div class="container">
                <div class="mt-5">
                    <div class="matchingNum">
                        {{ $match_users_count }}人とマッチングしています
                    </div>
                    <h2 class="pageTitle">マッチングした人一覧</h2>
                    <div class="matchingList">
                        @foreach ($matching_users as $user)
                            <div class="matchingPerson">
                                <div class="matchingPerson_img"><img src="/storage/user/{{ $user->thumbnail }}"></div>
                                <div class="matchingPerson_name">{{ $user->name }}</div>

                                <form method="POST" action="{{ route('chat.show') }}">
                                    @csrf
                                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                                    <button type="submit" class="chatForm_btn">チャットを開く</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
