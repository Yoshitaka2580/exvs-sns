<div class="card card-main">
  <div class="card-left">
    <a href="{{ route('posts.index', ['category_id' => $post->category->id]) }}" class="card-cost">
      {{ $post->category->name }}コスト
    </a>
  </div>
  <div class="card-right">
    <div class="card-title-btn">
      <h3 class="card-title">
        <a href="{{ route('posts.show', ['post' => $post]) }}" class="index-card-title">{{ $post->title }}</a>
      </h3>
      @if( Auth::id() === $post->user_id )
        <!-- ドロップダウンメニュー -->
        <div class="ml-auto card-edit-btn">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('posts.edit', ['post' => $post]) }}">
                <i class="fas fa-pen mr-1"></i>記事を更新する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $post->id }}">
                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
              </a>
            </div>
          </div>
        </div>

        <!-- モーダル -->
        <div id="modal-delete-{{ $post->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                  {{ $post->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
    </div>
    @foreach($post->tags as $tag)
    @if($loop->first)
    @endif
    <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="btn-backred tag-hashtag mt-2">
      {{ $tag->hashtag }}
    </a>
    @if($loop->last)
    @endif
    @endforeach
    <div class="card-score mt-2">
      <post-like
        :initial-is-liked-by='@json($post->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($post->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('posts.like', ['post' => $post]) }}"
      >
      </post-like>
      <a class="btn-clip-comment" href="{{ route('posts.show', ['post' => $post]) }}">
        <i class="fas fa-comment-dots"></i> {{ $post->comments->count() }}
      </a>

      <div class="card-user ml-auto">
        <a href="{{ route('users.show', ['name' => $post->user->name]) }}">
          @if(!empty($post->user->thumbnail))
            @if (app()->isLocal() || app()->runningUnitTests())
            <img src="/storage/user/{{ $post->user->thumbnail }}" class="user-thumbnail">
            @else
            <img src="{{ $post->user->thumbnail }}" class="user-thumbnail">
            @endif
          @else
          <i class="fas fa-user-circle user-icon"></i>
          @endif
        </a>
        <a href="{{ route('users.show', ['name' => $post->user->name]) }}">
          <p class="card-score-name">{{ $post->user->name }}</p>
        </a>
        <p class="ml-2">{{ $post->created_at->format('Y/m/d H:i') }}</p>
      </div>
    </div>
  </div>
</div>

