<div class="card card-mypage">
  <div class="mypage-left">
    <a href="{{ route('users.show', ['name' => $person->name]) }}" class="card-user">
      @if(($person->thumbnail))
        @if (app()->isLocal() || app()->runningUnitTests())
        <img src="/storage/user/{{ $person->thumbnail }}" class="editThumbnail">
        @else
        <img src="{{ $person->thumbnail }}" class="editThumbnail">
        @endif
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
    </a>
  </div>
  <div class="mypage-right ml-2">
    <h4 class="mt-0">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="mypage-user">
        {{ $person->name }}
      </a>
    </h4>
    <p>{{ $person->body }}</p>
  </div>
  @if( Auth::id() !== $person->id )
    <follow-button
      class="ml-auto"
      :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
      :authorized='@json(Auth::check())'
      endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
    >
    </follow-button>
  @endif
</div>
