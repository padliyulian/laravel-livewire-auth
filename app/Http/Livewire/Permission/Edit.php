<?php

namespace App\Http\Livewire\Permission;

use App\Models\Permission;
use Livewire\Component;

class Edit extends Component
{
    public $idPermission;
    public $name;
    public $guardName;

    public function mount($id)
    {
        $permission = Permission::findOrFail($id);
        $this->idPermission = $permission->id;
        $this->name = $permission->name;
        $this->guardName   = $permission->guard_name;
    }

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'permissions';
        $data['title'] = 'Livewire | Permission';

        return view('livewire.dashboard.permission.edit')->layout('layouts.dashboard', $data);
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:100|unique:permissions,name,'.$id,
            'guardName' => 'required|max:100',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $this->name;
        $permission->guard_name = $this->guardName;

        if ($permission->update()) {
            session()->flash('message.success', 'Update data successfully.');
            return redirect()->to('/permissions');
        }
    }
}
