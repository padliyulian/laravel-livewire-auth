<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/users') }}">Users</a>
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
                        <form action="{{ url('/users') }}" method="POST" encType="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name"/>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="email" name="email" class="form-control" placeholder="Email"/>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"/>
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea name="address" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="custom-file">
                                        <input name="photo" type="file" class="form-control" id="photo"/>
                                        <label class="custom-file-label" for="photo">Choose photo...</label>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password"/>
                                </div>
                                <div class="form-group col-lg-12">
                                    <select name="role" class="form-control">
                                        <option value="" disabled>Role</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <select name="status" class="form-control">
                                        <option value="" disabled>Status</option>
                                        <option value="1">Created</option>
                                        <option value="2">Active</option>
                                    </select>
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