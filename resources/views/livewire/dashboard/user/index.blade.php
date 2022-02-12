@push('page-css')
<style>
    .c--pointer {
        cursor: pointer;
    }
</style>
@endpush

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            User
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-2">
                        <a href="{{ url('/users/create') }}" class="btn btn-primary btn-block">
                            Tambah
                        </a>
                    </div>
                    <div class="form-group col-lg-2">
                        <a href="!#" class="btn btn-success btn-block">Reset</a>
                    </div>
                    <div class="form-group col-lg-2">
                        <select wire:model="length" name="limit" id="limit" class="custom-select">
                            <option value="2">2</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <input wire:model="search" type="text" name="searchKey" id="searchKey" class="form-control" placeholder="Cari data by name ..."/>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-responsive-lg">
                        <thead>
                            <tr>
                                <th class="c--pointer" wire:click="sortBy('name')">
                                    <i class="fas fa-sort"></i>
                                    Name
                                </th>
                                <th class="c--pointer" wire:click="sortBy('email')">
                                    <i class="fas fa-sort"></i>
                                    Email
                                </th>
                                <th>Photo</th>
                                <th>Role</th>
                                <th class="c--pointer" wire:click="sortBy('created_at')">
                                    <i class="fas fa-sort"></i>
                                    Created
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>photo</td>
                                    <td>role</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>actions</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data ...</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links('vendor.livewire.bootstrap') }}
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>