<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $title = 'Livewire | Dashboard';
        return view('livewire.dashboard.index')->layout('layouts.dashboard', compact('title'));
    }
}
