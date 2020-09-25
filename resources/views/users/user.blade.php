<div class="card">
  <div class="card-body">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="card-user">
    @if(!empty($user->thumbnail))
      <img src="/storage/user/{{ $user->thumbnail }}" class="editThumbnail">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
    </a>
    <h5 class="ml-3">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="card-user">
        {{ $user->name }}
      </a>
    </h5>
    @if( Auth::id() === $user->id )
    <!-- ドロップダウンメニュー -->
    <div class="ml-auto card-text">
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
  
  <div class="card-body card-user-body">
    <p class="card-text-p">{{ $user->body }}</p>
  </div>
  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="card-text-p font-weight-bold">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="ml-3 card-text-p font-weight-bold">
        {{ $user->count_followers }} フォロワー
      </a>
    </div>
  </div>
</div>
