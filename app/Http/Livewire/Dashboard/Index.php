<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data['currentMenu1'] = 'dashboard';
        $data['currentMenu2'] = '';
        $data['currentMenu3'] = '';
        $data['title'] = 'Livewire | Dashboard';
        
        return view('livewire.dashboard.index')
            ->layout('layouts.dashboard', $data);
    }
}
