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
  <li class="nav-item">
    <a class="nav-link {{ $hasFollowings ? 'active' : '' }}"
       href="{{ route('users.followings', ['name' => $user->name]) }}">
       {{ $user->count_followings }} フォロー
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $hasFollowers ? 'active' : '' }}"
       href="{{ route('users.followers', ['name' => $user->name]) }}">
      {{ $user->count_followers }} フォロワー
    </a>
  </li>
</ul>
