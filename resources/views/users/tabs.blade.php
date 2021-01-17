<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link tab-link {{ $hasPosts ? 'active' : '' }}"
       href="{{ route('users.show', ['name' => $user->name]) }}">
      投稿({{ $user->posts->count() }})
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $hasLikes ? 'active' : '' }}"
       href="{{ route('users.likes', ['name' => $user->name]) }}">
      クリップ({{ $user->likes->count() }})
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $hasFollowings ? 'active' : '' }}"
       href="{{ route('users.followings', ['name' => $user->name]) }}">
       フォロー({{ $user->count_followings }})
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $hasFollowers ? 'active' : '' }}"
       href="{{ route('users.followers', ['name' => $user->name]) }}">
      フォロワー({{ $user->count_followers }})
    </a>
  </li>
</ul>
