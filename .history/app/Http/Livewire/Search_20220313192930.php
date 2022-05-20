<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Search extends Component
{
    /*
    public function render()
    {
        return view('livewire.search');
    }
    */

    public $word = '';
    public $type = '';
    protected $queryString = [
        'word' => ['except' => ''],
        'type' => ['except' => '']
    ];

    protected $posts;

    public function updatedType()
    {
        $this->search();
    }

    public function render()
    {
        $this->search();

        return view('livewire.search', ['posts' => $this->posts])->layout('welcome');
    }

    public function search()
    {
        $word = $this->word;
        if ($this->type === 'new' || $this->type === '') {
            $this->posts = Post::where('title', 'like', '%' . $this->word . '%')->orderBy('created_at', 'desc')->get();
        } elseif ($this->type === 'old') {
            $this->posts = Post::where('title', 'like', '%' . $this->word . '%')->orderBy('created_at', 'asc')->get();
        }
    }
}
