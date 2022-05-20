<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use withPagination;

    public $perPage = 10;
    public $search = '';
    public $sortField = 'id';
    public $sortAsc = true;

    public function clear() {
        $this->search = '';
    }

    public function sortBy($field) {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $offers = \app\Models\Offer::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.search', ['offers' => $offers]);
    }


    /*
    public function render()
    {
        return view('livewire.search');
    }
    */

    /*
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

        return view('livewire.search', ['posts' => $this->posts])->extends('welcome');
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
    */

}
