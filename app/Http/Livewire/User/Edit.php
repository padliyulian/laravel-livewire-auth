<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $roles;

    public $idUser;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $address = 'address';
    public $phone = '';
    public $role = '';
    public $status = '';
    public $photo;

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->roles = Role::select('id','name')->get();
        
        if ($user) {
            $this->idUser   = $user->id;
            $this->name   = $user->name;
            $this->email   = $user->email;
            $this->address   = $user->address;
            $this->phone   = $user->phone;
            $this->role   = $user->role;
            $this->status   = $user->status;
        }
    }

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'users';
        $data['title'] = 'Livewire | User';

        return view('livewire.dashboard.user.edit')
            ->layout('layouts.dashboard', $data);
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,'.$id,
            'password' => 'nullable|confirmed|min:8|max:100',
            'address' => 'required|max:500',
            'phone' => 'required|max:20',
            'role' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|max:1024|image|mimes:jpeg,png,jpg',
        ]);

        $user = User::findOrFail($id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->phone = $this->phone;
        $user->status = $this->status;
        
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }

        if ($this->photo) {
            if ($user->photo != null) {
                Storage::delete('/public/images/'.$user->photo);
            }
            
            $filename = uniqid();
            $fileExt = $this->photo->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $this->photo->storePubliclyAs('/public/images', $fileNameToStore);

            $user->photo = $fileNameToStore;
        }

        if ($user->update()) {
            $user->syncRoles($this->role);
            session()->flash('message.success', 'Update data successfully.');
            return redirect()->to('/users');
        }
    }
}
