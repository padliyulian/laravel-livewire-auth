<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;

class Edit extends Component
{
    public $idRole;
    public $name;
    public $guardName;

    public function mount($id)
    {
        $role = Role::findOrFail($id);
        
        if ($role) {
            $this->idRole = $role->id;
            $this->name = $role->name;
            $this->guardName   = $role->guard_name;
        }
    }

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'roles';
        $data['title'] = 'Livewire | Role';

        return view('livewire.dashboard.role.edit')->layout('layouts.dashboard', $data);
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:100|unique:roles,name,'.$id,
            'guardName' => 'required|max:100',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $this->name;
        $role->guard_name = $this->guardName;

        if ($role->update()) {
            session()->flash('message.success', 'Update data successfully.');
            return redirect()->to('/roles');
        }
    }
}
