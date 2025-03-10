<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

class PostsIndex extends Component
{
    public $search = "Probando el texto";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::select('id', 'name')
                    // ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate(15);
    
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
