<?php

namespace App\Livewire;
// namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post; // Import the Post model



class PostComponent extends Component
{

    public $posts, $title, $body, $postId;
    public $isUpdate = false;

    public function mount()
    {
        
    $this->posts = Post::all();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->body = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        dd("hello");
        $this->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);
    
        // Log or dd to see if the method is reached
        // \Log::info('Store method called', ['title' => $this->title, 'body' => $this->body]);
    
        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);
    
        $this->resetFields();
        $this->posts = Post::all();  // Refresh post list
    }
    
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->isUpdate = true;
    }


    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($this->postId);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->resetFields();
        $this->posts = Post::all();  // Refresh post list
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        $this->posts = Post::all();  // Refresh post list
    }

    public function render()
    {
        return view('livewire.post-component');
    }
}
