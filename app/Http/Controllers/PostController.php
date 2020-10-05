<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //ポリシーを実行
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Post $post)
    {
        $posts = $post->all()->sortByDesc('created_at')
                ->load(['user', 'likes', 'tags']);
        
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('posts.create', compact('allTagNames'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tag = Tag::where('name', $search)->first();

        if ($tag === null) {
            return redirect('/posts')->with('flash_message', 'タグが未登録です');
        }
        
        return view('tags.show', compact('tag'));
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

    public function edit(Post $post)
    {
        $tagNames = $post->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
        
        return view('posts.edit', [
            'post' => $post,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
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

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->to('/posts');

    }

    public function like(Request $request, Post $post)
    {
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

    public function comment(Request $request, Comment $comment)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|max:140',
        ]);

        $input = $request->all();
        $comment->fill($input);
        $comment->user_id = $request->user()->id;
        $comment->save();
        
        return redirect()->route('posts.show', [$comment['post_id']]);

    }

    public function destroyComment(Post $post, Comment $comment)
    {
        $comment->delete();
        
        return redirect()->route('posts.show', compact('post'));
    }
}
