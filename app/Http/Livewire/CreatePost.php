<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostType;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CreatePost extends Component
{
    use WithFileUploads;

    public ?Post $post = null;

    public string $type;
    public ?string $title = '';
    public $cover;
    public ?string $embedUrl = '';
    public ?string $content = '# Write some content...';
    public $images;

    protected array $rules = [
        'title' => 'required|min:3',
        'embedUrl' => 'nullable|url',
        'content' => 'required|min:3',
    ];

    public function mount()
    {
        // Defaults
        $this->type = PostType::Blog->value;

        if ($this->post) {
            $this->type = $this->post->type->value;
            $this->title = $this->post->title;
            $this->embedUrl = $this->post->embed_url;
            $this->content = $this->post->content;
        }
    }

    public function getSlugProperty()
    {
        return str($this->title)->slug();
    }

    public function updatedCover()
    {
        $this->validate([
            'cover' => 'nullable|mimes:jpeg,png,jpg|max:4090',
        ]);

        if ($this->cover) {
            $this->post->addMedia($this->cover)->toMediaCollection('cover');
        }
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'nullable|mimes:jpeg,png,jpg|max:4090',
        ]);

        collect($this->images)->each(function ($uploadedFile) {
            $this->post->addMedia($uploadedFile)->toMediaCollection('images');
            ray('added', $uploadedFile);
        });
    }

    public function delete(int $mediaId)
    {
        Media::find($mediaId)?->delete();
    }

    public function submit()
    {
        $this->validate();

        if ($this->post) {
            $this->updatePost();
        } else {
            $this->createPost();
        }

        return redirect()->to(route('posts.show', $this->post));
    }

    public function createPost()
    {
        $this->post = Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'embed_url' => $this->embedUrl,
            'content' => $this->content,
            'published_at' => now(),
        ]);
    }

    public function updatePost()
    {
        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'embed_url' => $this->embedUrl,
            'content' => $this->content,
        ]);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
