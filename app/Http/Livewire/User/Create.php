<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $roles;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $address = 'address';
    public $phone = '';
    public $role = '';
    public $status = '';
    public $photo;

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'users';
        $data['title'] = 'Livewire | User';
        $this->roles =  Role::select('id','name')->get();

        return view('livewire.dashboard.user.create')->layout('layouts.dashboard', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|confirmed|min:8|max:100',
            'address' => 'required|max:500',
            'phone' => 'required|max:20',
            'role' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|max:1024|image|mimes:jpeg,png,jpg',
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->phone = $this->phone;
        $user->status = $this->status;
        $user->password = bcrypt($this->password);

        if ($this->photo) {
            $filename = uniqid();
            $fileExt = $this->photo->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $this->photo->storePubliclyAs('/public/images', $fileNameToStore);
            // $this->photo->storeAs('/public/images', $fileNameToStore);

            $user->photo = $fileNameToStore;
        }

        if ($user->save()) {
            $user->assignRole($this->role);
            $this->__clearForm();

            session()->flash('message.success', 'Add data successfully.');
            return redirect()->to('/users');
        }
    }

    public function __clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->address = 'address';
        $this->phone = '';
        $this->role = '';
        $this->status = '';
        $this->password = '';
    }
}
