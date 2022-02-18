<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/permissions') }}">Permissions</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Add
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-6">
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
                        <form wire:submit.prevent="store()" action="#" method="POST" encType="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input wire:model="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name"/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>               
                                <div class="form-group col-lg-12">
                                    <select wire:model="guardName" name="guardName" class="form-control @error('guardName') is-invalid @enderror">
                                        <option value="" disabled>Guard Name</option>
                                        <option value="web">web</option>
                                        <option value="api">api</option>
                                    </select>
                                    @error('guardName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>