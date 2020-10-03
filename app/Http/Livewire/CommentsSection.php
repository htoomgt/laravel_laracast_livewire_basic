<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public Post $post;

    public string $comment = "";


    /**
     * @var string $successMessage for displaying success message in creating comments of the specific post
     */
    public string $successMessage = "";

    protected array $rules = [
        'comment' => 'required|min:4',
        'post' => 'required'
    ];

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'Guest',
            'content' => $this->comment,
        ]);
        sleep(1);
        $this->comment = '';

        $this->post = Post::find($this->post->id);

        $this->successMessage = 'Comment was posted!';


    }



    public function render()
    {
        return view('livewire.comments-section');
    }
}
