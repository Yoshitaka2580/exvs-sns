<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link tab-link {{ $hasPosts ? 'active' : '' }}"
       href="{{ route('users.show', ['name' => $user->name]) }}">
      投稿
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $hasLikes ? 'active' : '' }}"
       href="{{ route('users.likes', ['name' => $user->name]) }}">
      お気に入り
    </a>
  </li>
</ul>
