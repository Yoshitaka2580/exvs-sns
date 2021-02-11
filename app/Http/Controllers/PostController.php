<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
        //ポリシーを実行
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request, Category $category)
    {
        $categories = $category->getLists();

        $category_id = $request->category_id;

        $posts = Post::orderBy('created_at', 'desc')
                ->categoryAt($category_id)
                ->paginate(5);

        $posts->load(['user', 'likes', 'tags', 'comments', 'category']);

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories,
            'category_id'=> $category_id,
        ]);
    }

    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    public function create(Category $category)
    {
        $categories = $category->getLists();

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('posts.create', [
            'allTagNames' => $allTagNames,
            'categories' => $categories,
        ]);
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input);
        $post->user_id = $request->user()->id;
        $post->save();

        $request->tags->each(function ($tagName) use ($post) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        });

        return redirect()->route('posts.index');
    }

    public function edit(Post $post, Category $category)
    {
        $tagNames = $post->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $categories = $category->getLists();

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('posts.edit', [
            'post' => $post,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'categories' => $categories,
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        $post->tags()->detach();
        $request->tags->each(function ($tagName) use ($post) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        });

        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->to('/posts');
    }

    public function searchTag(Request $request)
    {
        $search = $request->get('search');
        $tag = Tag::where('name', $search)->first();

        if ($tag === null) {
            return redirect('/posts')
                    ->with('flash_message', '検索に該当するタグは登録されていません');
        }

        return view('tags.show', compact('tag'));
    }

    public function like(Request $request, Post $post)
    {
        // 不正リクエスト防止
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }

    public function unlike(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }
}
