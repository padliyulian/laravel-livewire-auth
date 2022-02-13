<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $length = 25;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $search = '';

    protected $paginationTheme = 'bootstrap';
    // protected $updateQueryString = [
    //     'search'
    // ];

    // public function mount()
    // {
    //     $this->search = request()->query('search', $this->search);
    // }

    public function updatingLength()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $title = 'Livewire | User';

        $query = User::orderBy($this->sortBy, $this->sortDirection);

        if ($this->search !== '') {
            $query->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        $users = $query->paginate($this->length);

        return view('livewire.dashboard.user.index', compact('users'))
            ->layout('layouts.dashboard', compact('title'));
            // ->extends('layouts.dashboard', compact('title'))
            // ->section('body');
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
 
        $this->sortBy = $field;
    }
 
    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
    
}
