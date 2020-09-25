<div class="card card-create">
  @include('error_list')
  <form method="POST" action="{{ route('comment.store', ['post' => $post]) }}">
    @csrf
    <input name="post_id" type="hidden" value="{{ $post->id }}">
    <div class="form-group mt-3">
      <textarea name="comment" class="form-control" rows="4" required placeholder="返信コメント">{{ old('commnet') }}</textarea>
    </div>
    <button type="submit" class="btn btn-submit btn-comment">返信する</button>
  </form>

  <section>
    <h5 class="card-text">返信一覧</h5>
    @forelse($post->comments as $comment)
    <div class="card-text comment-text">
      <p class="card-user">From: <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="comment-user">{{ $comment->atsign }}</a></p>
      @if( Auth::id() === $comment->user_id )
      <!-- ドロップダウンメニュー -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-check" style="color: #747373;"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
              <i class="fas fa-trash-alt mr-1"></i>記事を削除する
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
    <p class="card-text-p">{!! nl2br(e($comment->comment)) !!}</p>
    @empty
    <p class="card-text-p">返信はありません。</p>
    @endforelse
  </section>
</div>


