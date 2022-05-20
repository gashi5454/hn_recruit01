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
        $offers = \App\Models\Offer::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.search', ['offers' => $offers]);
    }

}
