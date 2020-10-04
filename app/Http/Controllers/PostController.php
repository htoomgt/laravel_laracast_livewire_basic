<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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

    public function showPostsList()
    {
        $posts = Post::all();

        return view('post.post-list', ['posts' => $posts]);
    }

    public function editPost(Post $post)
    {
        return view('post.post-edit', ['post' => $post]);
    }

    /**
     *  Post update including photo
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:4',
            'photo' => 'nullable|sometimes|image|max:5000',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'photo' => $request->file('photo') ? $request->file('photo')->store('photos', 'public') : $post->photo,
        ]);



        return back()->with('success_message', 'Post was updated successfully!');
    }
}
