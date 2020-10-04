<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

class PostEdit extends Component
{
    use WithFileUploads;

    public Post $post;
    public string $title;
    public string $content;
    public $photo = null;
    public string $successMessage = '';
    public $uploadFileExt;
    private ?array $allowedExt = [];

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->allowedExt = ['jpeg', 'jpg', 'png'];
    }

    public function updatedPhoto()
    {
        $this->validate();
    }

    /**
     *To process edit submit form of post
     * @return void
     */
    public function submitForm():void
    {


        $this->validate();

        $imageToShow = $this->post->photo ?? null;

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToShow,
        ]);

        $this->successMessage = 'Post was updated successfully!';
    }

    /**
     *
     * @return view
     */
    public function render()
    {


        return view('livewire.post-edit');
    }
}
