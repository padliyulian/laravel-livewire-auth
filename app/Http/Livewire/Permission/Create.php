<?php

namespace App\Http\Livewire\Permission;

use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $guardName = '';

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'permissions';
        $data['title'] = 'Livewire | Permission';

        return view('livewire.dashboard.permission.create')->layout('layouts.dashboard', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:100|unique:permissions,name',
            'guardName' => 'required|max:100',
        ]);

        $permission = new Permission;
        $permission->name = $this->name;
        $permission->guard_name = $this->guardName;

        if ($permission->save()) {
            session()->flash('message.success', 'Add data successfully.');
            return redirect()->to('/permissions');
        }
    }
}
