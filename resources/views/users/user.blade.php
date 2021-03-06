<div class="card card-mypage">
  <div class="mypage-left">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="card-user">
      @if(!empty($user->thumbnail))
        @if (app()->isLocal() || app()->runningUnitTests())
        <img src="/storage/user/{{ $user->thumbnail }}" class="mypage-thumbnail">
        @else
        <img src="{{ $user->thumbnail }}" class="mypage-thumbnail">
        @endif
      @else
      <i class="fas fa-user" style="font-size: 150px;"></i>
      @endif
    </a>
  </div>
  <div class="mypage-right ml-3">
    <h4 class="mb-0">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="mypage-user">
        {{ $user->name }}
      </a>
    </h4>
    <p class="mt-3">＜自己紹介＞</p>
    @empty($user->body)
    <p class="empty-text">記入がありません</p>
    @else
    <p>{{ $user->body }}</p>
    @endempty
  </div>
  @if( Auth::id() === $user->id )
  <!-- ドロップダウンメニュー -->
  <div class="ml-auto card-edit-btn">
    <div class="dropdown">
      <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-edit"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('users.edit', ['name' => $user->name]) }}">
          <i class="fas fa-pen mr-1"></i>プロフィールを更新する
        </a>
      </div>
    </div>
  </div>
  @endif
  @if( Auth::id() !== $user->id )
    <follow-button
      class="ml-auto"
      :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
      :authorized='@json(Auth::check())'
      endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
    >
    </follow-button>
  @endif
</div>
