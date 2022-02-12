<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public function render()
    {
        $title = 'Livewire | User';
        return view('livewire.dashboard.user.create')->layout('layouts.dashboard', compact('title'));
    }
}
