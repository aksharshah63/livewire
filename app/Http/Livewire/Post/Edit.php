<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->post->save();

        return redirect()->route('admin.posts.index');
    }

    protected function rules(): array
    {
        return [
            'post.title' => [
                'string',
                'required',
            ],
            'post.description' => [
                'string',
                'required',
            ],
        ];
    }
}
