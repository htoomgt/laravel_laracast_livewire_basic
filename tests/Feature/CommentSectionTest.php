<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentsSection;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CommentSectionTest extends TestCase
{
    use RefreshDatabase;


    /**
     * To test created post can be seen at post page by Id
     *
     * @return void
     */
    public function testPostPageContainPost()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        $this->get(route('post.show', $post))
            ->assertSee($post->title);
    }


    /**
     * To test comment livewire component is seen in post page
     *
     * @return void
     */
    public function testPostPageContainCommentLivewireComponent()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        $this->get(route('post.show', $post))
                ->assertSeeLivewire('comments-section');

    }

    public function testValidCommentCanBePosted()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        Livewire::test(CommentsSection::class)
                ->set('post', $post)
                ->set('comment','This is my comment')
                ->call('postComment')
                ->assertSee('Comment was posted')
                ->assertSee('This is my comment');
    }


}
