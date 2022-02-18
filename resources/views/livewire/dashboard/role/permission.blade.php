<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/roles') }}">Roles</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Permissions
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span class="text-capitalize">{{ $role->name }}</span> Role
                </div>
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
                <form wire:submit.prevent="update({{$role->id}})" action="#" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>View</th>
                                <th>Add</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Users</td>
                                <td>
                                    @forelse ($permissions as $item)
                                        @if ($item->name === 'view users')
                                            <div class="form-check">
                                                <input wire:click="syncPermission({{$item->id}})" name="permissions[]" class="form-check-input" type="checkbox" value="{{$item->id}}" {{$role->hasPermissionTo($item->name) ? 'checked':''}}>
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($permissions as $item)
                                        @if ($item->name === 'add users')
                                            <div class="form-check">
                                                <input wire:click="syncPermission({{$item->id}})" name="permissions[]" class="form-check-input" type="checkbox" value="{{$item->id}}" {{$role->hasPermissionTo($item->name) ? 'checked':''}}>
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($permissions as $item)
                                        @if ($item->name === 'edit users')
                                            <div class="form-check">
                                                <input wire:click="syncPermission({{$item->id}})" name="permissions[]" class="form-check-input" type="checkbox" value="{{$item->id}}" {{$role->hasPermissionTo($item->name) ? 'checked':''}}>
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($permissions as $item)
                                        @if ($item->name === 'delete users')
                                            <div class="form-check">
                                                <input wire:click="syncPermission({{$item->id}})" name="permissions[]" class="form-check-input" type="checkbox" value="{{$item->id}}" {{$role->hasPermissionTo($item->name) ? 'checked':''}}>
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>