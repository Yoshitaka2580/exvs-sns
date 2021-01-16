@csrf
<div class="user-edit">
@if(!empty($user->thumbnail))
  <img src="/storage/user/{{ $user->thumbnail }}" class="mypage-thumbnail">
@else
  <i class="fas fa-user mypage-user-icon"></i>
  <p class="mt-2">画像なし</p>
@endif
</div>

<div class="md-form">
  <input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
  <h3 class="user-edit">{{ $user->name }}</h3>
</div>
<div class="form-group">
  <textarea class="form-control my-textarea" name="body" row="12" placeholder="自己紹介">{{ $user->body ?? old('body') }}</textarea>
</div>
<div class="form-group user-edit">
  <label>プロフィール画像</label>
  <input type="file" name="thumbnail">
</div>

