<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
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
    private ?array $allowedExt = ['jpeg', 'jpg', 'png'];
    public $tempUrl = "";

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000',
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public  function refreshComponent()
    {

    }

    public function updatedPhoto()
    {
//        Log::debug('uploaded file extension : '. $this->photo->getClientOriginalExtension());
//        if(!in_array($this->photo->getClientOriginalExtension(), $this->allowedExt)){
//            Log::debug("Uploaded file extension ".$this->photo->getClientOriginalExtension()." is not allowed");
//            $this->tempUrl = '';
//
//
//        }

        try{
            $this->tempUrl = $this->photo->temporaryUrl();

        }catch(\Exception $ex ){
            $this->tempUrl = '';
            Log::error("Photo temp url error : ".$ex->getMessage());
            $this->refreshComponent();
        }


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
