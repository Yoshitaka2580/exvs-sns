@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" value="{{ $post->title ?? old('title') }}" required style="color: #fff;">
</div>

<div class="form-group">
  <select 
    name="category_id"
    class="form-control"
    value="{{ $post->category_id ?? old('category_id') }}"
  >
  <option>自分の機体コストを選択してください</option>
  @foreach($categories as $id => $name)
    <option value="{{ $id }}">{{ $name }}cost</option>
  @endforeach
  </select>
</div>

<div class="form-group">
  <post-tags-input 
  :initial-tags='@json($tagNames ?? [])'
  :autocomplete-items='@json($allTagNames ?? [])'>
  </post-tags-input>
</div>
  
<div class="form-group">
  <textarea name="body" class="form-control" rows="7" placeholder="ここに詳細内容書いてください。" required>
    {{ $post->body ?? old('body') }}
  </textarea>
</div>