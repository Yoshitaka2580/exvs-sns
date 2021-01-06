<header class="navbar navbar-expand navbar-dark">
  <div class="container">
    <a class="navbar-home" href="/posts"><i class="fab fa-playstation"></i>MAXBOOSTON MATCHING</a>
    <form action="/search" method="get" class="input-group md-form form-sm form-2 pl-0 tag-form">
      <input type="search" name="search" required class="form-control my-0 py-1 red-border" placeholder="キーワードで検索[タグ名]" style="color: #fff;">
      <button type="submit" class="input-group-text red lighten-3"><i class="fas fa-search text-white"></i></button>
    </form>
    <ul class="navbar-nav">
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">新規登録</a>
      </li>
      @endguest

      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
      </li>
      @endguest

      @auth
      <li class="nav-item">
        <a class="nav" href="{{ route('posts.create') }}"><i class="fas fa-pen-alt"></i>募集する</a>
      </li>
      @endauth

      @auth
      <!-- Dropdown -->
      <li class="nav-item dropdown">
      <a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" style="color: #fff;">
        @if(!empty(Auth::user()->thumbnail))
          <img src="/storage/user/{{ Auth::user()->thumbnail }}" class="editThumbnail">
        @else
          <i class="fas fa-user-circle user-circle"></i>
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
        <div class="dropdown-divider"></div>
        <button onclick="location.href='http://spread-exvsmbon.com/'" class="dropdown-item">
          マキシブーストオン攻略サイトはこちらへ
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