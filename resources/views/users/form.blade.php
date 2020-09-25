@csrf
<div class="user-edit">
@if(!empty($user->thumbnail))
  <img src="/storage/user/{{ $user->thumbnail }}" class="editThumbnail">
@else
  <div class="card-user">画像なし</div>
@endif
</div>

<div class="md-form">
  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
  <h3 class="card-user user-edit">{{ $user->name }}</h3>
</div>
<div class="form-group">
  <textarea class="form-control" name="body" row="12" placeholder="自己紹介">{{ $user->body ?? old('body') }}</textarea>
</div>
<div class="form-group user-edit card-user">
  <label>プロフィール画像</label>
  <input type="file" name="thumbnail">
</div>

