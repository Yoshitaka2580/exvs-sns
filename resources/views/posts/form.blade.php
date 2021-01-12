@csrf
<div class="md-form">
  <p class="name-label">タイトル<span class="form-alert">※</span></p>
  <input type="text" name="title" class="form-control p-0" value="{{ $post->title ?? old('title') }}" required style="color: #fff;">
</div>

<div class="form-group">
  <p class="name-label">機体名を登録してください</p>
  <post-tags-input 
  :initial-tags='@json($tagNames ?? [])'
  :autocomplete-items='@json($allTagNames ?? [])'>
  </post-tags-input>
</div>

<div class="form-group">
<p class="name-label">機体コストを選択してください<span class="form-alert">※</span></p>
  <select 
    name="category_id"
    class="form-control form-cost"
    value="{{ $post->category_id ?? old('category_id') }}"
  >
  @foreach($categories as $id => $name)
    <option value="{{ $id }}">{{ $name }}cost</option>
  @endforeach
  </select>
</div>
  
<div class="form-group">
  <p class="name-label">備考<span class="form-alert">※</span></p>
  <textarea name="body" class="form-control" rows="7" placeholder="ここに詳細内容書いてください。" required>
    {{ $post->body ?? old('body') }}
  </textarea>
</div>