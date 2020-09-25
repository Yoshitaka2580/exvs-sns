<nav class="tags-nav">
  <div class="cost-wrapper">
    <div class="container cost-container">
      <div class="cost-item">
        <a class="cost-link btn-backred" href="{{ route('posts.index') }}">All</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 3000]) }}">3000</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 2500]) }}">2500</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 2000]) }}">2000</a>
        <a class="cost-link btn-backred" href="{{ route('tags.show', ['name' => 1500]) }}">1500</a>
        <form action="/search" method="get">
          <input type="search" name="search" required class="tagInput" placeholder="タグを検索">
          <button type="submit" class="btn-search btn-backred"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</nav>