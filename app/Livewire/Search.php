<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Livewire;

class Search extends Component
{
    public $searchQuery = '';

    public function search()
    {
        Livewire::emit('searchQueryUpdated', $this->searchQuery); // Use Livewire facade
        // dd($this->searchQuery);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
