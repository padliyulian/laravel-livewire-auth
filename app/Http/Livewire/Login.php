<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
 
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
