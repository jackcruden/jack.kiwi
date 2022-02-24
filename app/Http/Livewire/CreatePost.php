<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public ?Post $post = null;
    public ?string $title = '';
    public ?string $embedUrl = '';
    public ?string $content = '# Write some content...';

    public function mount()
    {
        if ($this->post) {
            $this->title = $this->post->title;
            $this->embedUrl = $this->post->embed_url;
            $this->content = $this->post->content;
        }
    }

    public function getSlugProperty()
    {
        return str($this->title)->slug();
    }

    public function submit()
    {
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
            'content' => $this->content,
            'published_at' => now(),
        ]);
    }

    public function updatePost()
    {
        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
