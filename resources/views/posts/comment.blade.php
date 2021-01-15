<div class="card-comment">
  @include('error_list')
  <h5>コメント一覧</h5>
  @forelse($post->comments as $comment)
  <div class="comment-text">
    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class= "card-user">
    @if(!empty($comment->user->thumbnail))
    <img src="/storage/user/{{ $comment->user->thumbnail }}" class="editThumbnail">
    @else
    <i class="fas fa-user-circle circle-editThumbnail"></i>
    @endif
    </a>
    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="comment-user">{{ $comment->atsign }}</a>
    @if( Auth::id() === $comment->user_id )
    <!-- ドロップダウンメニュー -->
    <div class="ml-auto card-text">
      <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-trash-alt" style="color: #747373;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
            <i class="fas fa-trash-alt mr-1"></i>コメントを削除する
          </a>
        </div>
      </div>
    </div>
    <!-- モーダル -->
    <div id="modal-delete-{{ $comment->id }}" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('comment.destroy', ['post' => $post, 'comment' => $comment->id]) }}">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              {{ $comment->comment }}を削除します。よろしいですか？
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
  <p class="card-text-p pl-5">{!! nl2br(e($comment->comment)) !!}</p>
  @empty
  <p class="card-text-p">コメントはありません。</p>
  @endforelse
  <div class="comment-form">
    <a href="{{ route('users.show', ['name' => $post->user->name]) }}" class= "card-user">
      @if(!empty($post->user->thumbnail))
      <img src="/storage/user/{{ $post->user->thumbnail }}" class="editThumbnail">
      @else
      <i class="fas fa-user-circle circle-editThumbnail"></i>
      @endif
    </a>
    <form method="POST" action="{{ route('comment.store', ['post' => $post]) }}" style="width: 100%;" class="ml-2">
    @csrf
    <input name="post_id" type="hidden" value="{{ $post->id }}">
      <div class="form-group mt-3">
        <textarea name="comment" class="form-control" rows="3" required placeholder="コメントを入力してください">{{ old('commnet') }}</textarea>
      </div>
      <button type="submit" class="btn btn-submit comment-btn">コメントする</button>
    </form>
  </div>
</div>


