<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use App\Models\Permission as Permis;
use Livewire\Component;

class Permission extends Component
{
    public $role;
    public $permissions;
    public $rolePermissions = array();

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);
        // $this->rolePermissions = $this->role->permissions;
        $this->permissions = Permis::select('id','name')->get();

        foreach ($this->role->permissions as $item) {
            $this->rolePermissions[] = $item->id;
        }
    }

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'roles';
        $data['title'] = 'Livewire | Role';

        return view('livewire.dashboard.role.permission')->layout('layouts.dashboard', $data);
    }

    public function syncPermission($permission)
    {
        if (($key = array_search($permission, $this->rolePermissions)) !== false) {
            unset($this->rolePermissions[$key]);
        } else {
            $this->rolePermissions[] = $permission;
        }
    }

    public function update($id)
    {
        // return dd($this->rolePermissions);
        $role = Role::findOrFail($id);

        if ($role->name === 'admin') {
            $role->syncPermissions(Permis::all());
        } else {
            $role->syncPermissions($this->rolePermissions);
        }

        session()->flash('message.success', 'Update permission successfully.');
        return redirect()->to('/roles');
    }
}
