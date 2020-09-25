<div class="card">
  <div class="card-body">
    <a href="{{ route('users.show', ['name' => $person->name]) }}" class="card-user">
    @if(!empty($person->thumbnail))
          <img src="/storage/user/{{ $person->thumbnail }}" class="editThumbnail">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
    </a>
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
  <h5 class="card-body pt-0">
      <a href="{{ route('users.show', ['name' => $person->name]) }}" class="card-user user-name">
        {{ $person->name }}
      </a>
    <p class="ml-5 card-text-p">{{ $person->body }}</p>
  </h5>
</div>
