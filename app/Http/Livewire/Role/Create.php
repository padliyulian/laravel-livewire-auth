<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $guardName = '';

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'roles';
        $data['title'] = 'Livewire | Role';

        return view('livewire.dashboard.role.create')->layout('layouts.dashboard', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:100|unique:roles,name',
            'guardName' => 'required|max:100',
        ]);

        $role = new Role;
        $role->name = $this->name;
        $role->guard_name = $this->guardName;

        if ($role->save()) {
            session()->flash('message.success', 'Add data successfully.');
            return redirect()->to('/roles');
        }
    }
}
