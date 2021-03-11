<header class="navbar navbar-expand navbar-dark">
    <div class="container">
        <a class="navbar-home" href="/"><i class="fab fa-playstation"></i>VS-Connect</a>
        @auth
            <form action="/search" method="get" class="input-group md-form form-sm form-2 pl-0 tag-form">
                <input type="search" name="search" required class="form-control input-search my-0 py-1 red-border"
                    placeholder="キーワードで検索[タグ名]" style="color: #fff;">
                <button type="submit" class="input-group-text search-blue"><i class="fas fa-search text-white"></i></button>
            </form>
        @endauth
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/posts"><i class="fas fa-newspaper"></i>投稿一覧</a>
                </li>
            @endguest
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user"></i>新規登録</a>
                </li>
            @endguest

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>ログイン</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link nav-article" href="{{ route('posts.create') }}"><i
                            class="fas fa-pen-alt"></i>投稿する</a>
                </li>
            @endauth

            @auth
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        @if (!empty(Auth::user()->thumbnail))
                            @if (app()->isLocal() || app()->runningUnitTests())
                                <img src="/storage/user/{{ Auth::user()->thumbnail }}" class="editThumbnail">
                            @else
                                <img src="{{ Auth::user()->thumbnail }}" class="editThumbnail">
                            @endif
                        @else
                            <i class="fas fa-user-circle circle-editThumbnail" style="vertical-align: middle;"></i>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                        aria-labelledby="navbarDropdownMenuLink">
                        <button class="dropdown-item" type="button"
                            onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
                            マイページ
                        </button>
                        <div class="dropdown-divider"></div>
                        <button form="logout-button" class="dropdown-item" type="submit">
                            ログアウト
                        </button>
                    </div>
                </li>
                <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                <!-- Dropdown -->
            @endauth
        </ul>
    </div>
</header>
