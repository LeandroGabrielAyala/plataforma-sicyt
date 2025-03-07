<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

class PostsIndex extends Component
{
    public $search = "Probando texto";

    public function render()
    {
        $posts = Post::select('id', 'name')
                    // ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate(15);
    
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
