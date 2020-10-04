<?php

namespace Tests\Feature;

use App\Http\Livewire\PostEdit;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PostEditTest extends TestCase
{
    use RefreshDatabase;

    public function testPostEditPageContainPostEditLivewireComponet()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        $this->get(route('post.edit', $post))
            ->assertSeeLivewire('post-edit');
    }

    public function testPostEditPageFormWorks()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        Livewire::test(PostEdit::class, ['post' => $post])
                ->set('title', 'New Title')
                ->set('content', 'New Content')
                ->call('submitForm')
                ->assertSee('Post was updated successfully');



    }

    public function testPostEditPageUploadWorks()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('photo.jpg');

        Livewire::test(PostEdit::class, ['post' => $post])
            ->set('title', 'New Title')
            ->set('content', 'New Content')
            ->set('photo', $file)
            ->call('submitForm')
            ->assertSee('Post was updated successfully');

        $post->refresh();

        $this->assertNotNull($post->photo);
        Storage::disk('public')->assertExists($post->photo);



    }

    public function testPostEditPageUploadDoesNotWorks()
    {
        $post = Post::create([
            'title' => 'Testing Post of Test Case',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis dolor laudantium libero maiores mollitia nesciunt numquam quaerat! Accusamus asperiores, cumque distinctio ea excepturi exercitationem nulla quam quo voluptatem voluptates!'
        ]);

        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 1000);

        Livewire::test(PostEdit::class, ['post' => $post])
            ->set('title', 'New Title')
            ->set('content', 'New Content')
            ->set('photo', $file)
            ->call('submitForm')
            ->assertSee('The photo must be an image')
            ->assertHasErrors(['photo' => 'image']);


        $post->refresh();

        $this->assertNull($post->photo);
        Storage::disk('public')->assertMissing($post->photo);





    }


}
