<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(('auth'));
    }

    public function comment(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|max:140',
        ]);

        $input = $request->all();
        $comment->fill($input);
        $comment->post_id = $request->post;
        $comment->user_id = $request->user()->id;
        $comment->save();
        
        return redirect()->route('posts.show', [
            'post' => $comment->post_id
        ]);

    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        
        return redirect()->route('posts.show', compact('post'));
    }



}
