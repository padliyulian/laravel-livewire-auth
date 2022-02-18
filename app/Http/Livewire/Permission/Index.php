<?php

namespace App\Http\Livewire\Permission;

use App\Models\Permission;
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
        $data['currentMenu3'] = 'permissions';
        $data['title'] = 'Livewire | Permission';

        $query = Permission::orderBy($this->sortBy, $this->sortDirection);

        if ($this->search !== '') {
            $query->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $permissions = $query->paginate($this->length);

        return view('livewire.dashboard.permission.index', compact('permissions'))
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
        $permission = Permission::findOrFail($id);
        if ($permission->delete()) {
            session()->flash('message.success', 'Delete data successfully.');
            return redirect()->to('/permissions');
        }
    }
}
