<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $length = 10;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingLength()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data['currentMenu1'] = 'settings';
        $data['currentMenu2'] = 'auth';
        $data['currentMenu3'] = 'roles';
        $data['title'] = 'Livewire | Role';

        $query = Role::orderBy($this->sortBy, $this->sortDirection);

        if ($this->search !== '') {
            $query->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $roles = $query->paginate($this->length);

        return view('livewire.dashboard.role.index', compact('roles'))
            ->layout('layouts.dashboard', $data);
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'desc';
 
        $this->sortBy = $field;
    }
 
    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
    

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if ($role) {
            if ($role->delete()) {
                session()->flash('message.success', 'Delete data successfully.');
                return redirect()->to('/roles');
            }
        }
    }
}
