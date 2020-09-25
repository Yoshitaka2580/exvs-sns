@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" value="{{ $post->title ?? old('title') }}" required style="color: #fff;">
</div>
<div class="form-group">
  <post-tags-input 
  :initial-tags='@json($tagNames ?? [])'
  :autocomplete-items='@json($allTagNames ?? [])'>
  </post-tags-input>
</div>
<div class="form-group">
  <textarea name="body" class="form-control" rows="9" placeholder="募集内容" required>{{ $post->body ?? old('body') }}</textarea>
</div>