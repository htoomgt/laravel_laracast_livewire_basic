<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPostById(Request $request, Post $post)
    {
        return view('post.showPostById', ['post' => $post]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeCommentOnPost(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|min:4'
        ]);

        Comment::create([
            'post_id' => $post->id,
            'username' => 'Guest',
            'content' => $request->comment,
        ]);

        return back()->with('success_message', 'Comment was posted!');
    }
}
