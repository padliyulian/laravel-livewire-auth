@push('page-css')
<style>
    .c--pointer {
        cursor: pointer;
    }
</style>
@endpush

<div class="content-wrapper">
    @if (session()->has('message.success'))
        <input type="hidden" name="message-success" id="message-success" value="{{ session('message.success') }}">
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
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
                        <a href="{{ url('/permissions/create') }}" class="btn btn-primary btn-block">
                            Tambah
                        </a>
                    </div>
                    <div class="form-group col-lg-2">
                        <a href="{{ url('/permissions') }}" class="btn btn-success btn-block">Reset</a>
                    </div>
                    <div class="form-group col-lg-2">
                        <select wire:model="length" name="limit" id="limit" class="custom-select">
                            <option value="10">10</option>
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
                                <th class="c--pointer" wire:click="sortBy('guard_name')">
                                    <i class="fas fa-sort"></i>
                                    Guard Name
                                </th>
                                <th class="c--pointer" wire:click="sortBy('created_at')">
                                    <i class="fas fa-sort"></i>
                                    Created
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->guard_name }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/permissions/edit/'.$item->id) }}" href="#" title="Edit">
                                            <span class="text-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                        <span wire:click="destroy({{$item->id}})">
                                            <a href="#" title="Delete" class="js-btn--delete">
                                                <span class="text-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data ...</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $permissions->links('vendor.livewire.bootstrap') }}
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>

@push('page-js')
    <script>
        if ($('#message-success').val()) {
            Swal.fire(
                'Success',
                `${$('#message-success').val()}`,
                'success'
            )
        }
    </script>
@endpush