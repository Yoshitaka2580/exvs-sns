<div class="card card-mypage">
  <div class="card-left">
    <a href="{{ route('users.show', ['name' => $person->name]) }}" class="card-user">
      @if(!empty($person->thumbnail))
      <img src="/storage/user/{{ $person->thumbnail }}" class="editThumbnail">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
    </a>
  </div>
  <div class="card-right ml-3">
    <h4 class="mb-0">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="card-user">
        {{ $person->name }}
      </a>
    </h4>
    <p class="card-text">{{ $person->body }}</p>
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
