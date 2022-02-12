<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        $title = 'Livewire | Login';
        return view('livewire.auth.login')->layout('layouts.auth', compact('title'));
    }
}
