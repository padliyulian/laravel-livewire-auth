<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Livewire Auth' }}</title>
    <link rel="icon" href="/favicon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"
    >
    <link
        rel="stylesheet"
        href="{{asset('/assets/vendor/fontawesome/css/all.css')}}"
    >
    <link
        rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    >
    <link
        rel="stylesheet"
        href="{{asset('/assets/vendor/adminlte/icheck-bootstrap.min.css')}}"
    >
    <link
        rel="stylesheet"
        href="{{asset('/assets/vendor/adminlte/adminlte.min.css')}}"
    >
    @livewireStyles
    @stack('page-css')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"/>
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">
                            10
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        admin@mail.com
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">subject</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 20/12/2021
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">
                            20
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            21 Notifications
                        </span>
                        <div class="dropdown-divider"></div>
                            <a href="/user/lsp_contact" class="dropdown-item">        
                                <i class="fas fa-envelope mr-2"></i> 22 new messages   
                            </a>
                            <div class="dropdown-divider"></div>
                        
                            <a href="/user/event_landing" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 3 event requests
                            </a>
                            <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/dashboard') }}" class="brand-link">
                <img src="/assets/images/logo.png" alt="logo" class="brand-image img-circle elevation-3"/>
                <span class="brand-text font-weight-light">Beauty</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (auth()->user()->photo)
                            <img src="{{ url(env('APP_URL').'/storage/images/'.auth()->user()->photo) }}" class="img-circle elevation-2" alt="avatar"/>
                        @else
                            <img src="/assets/images/woman.png" class="img-circle elevation-2" alt="avatar"/>
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ auth()->user()->name ?? 'username' }}
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('/dashboard')}}" class="nav-link {{$currentMenu1 === 'dashboard' ? 'active':''}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Products
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link">
                                        <i class="nav-icon fas fa-layer-group"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/product/attribute" class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>Attribute</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/product" class="nav-link">
                                        <i class="nav-icon fas fa-archive"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Orders
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/orders" class="nav-link">
                                        <i class="nav-icon fas fa-truck-loading"></i>
                                        <p>Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/orders/trashed" class="nav-link">
                                        <i class="nav-icon fas fa-trash"></i>
                                        <p>Trash</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="shipments" class="nav-link">
                                        <i class="nav-icon fas fa-truck-moving"></i>
                                        <p>Shipment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Reports
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/reports/revenue" class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Revenue</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/reports/product" class="nav-link">
                                        <i class="nav-icon fas fa-cubes"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/reports/inventory" class="nav-link">
                                        <i class="nav-icon fas fa-dolly-flatbed"></i>
                                        <p>Inventory</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/reports/payment" class="nav-link">
                                        <i class="nav-icon fas fa-money-bill-wave"></i>
                                        <p>Payment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @hasrole('admin')
                        <li class="nav-item has-treeview {{$currentMenu1 == 'settings' ? 'menu-open':''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview {{$currentMenu2 == 'auth' ? 'menu-open':''}}">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-users-cog nav-icon"></i>
                                        <p>
                                            <span>User & Role</span>
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('/roles')}}" class="nav-link {{$currentMenu3 === 'roles' ? 'active':''}}">
                                                <i class="fas fa-user-shield nav-icon"></i>
                                                <p>Roles</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/permissions')}}" class="nav-link {{$currentMenu3 === 'permissions' ? 'active':''}}">
                                                <i class="fas fa-user-cog nav-icon"></i>
                                                <p>Permissions</p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="{{ url('/users') }}" class="nav-link {{$currentMenu3 === 'users' ? 'active':''}}">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>Users</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endhasrole

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        {{-- @yield('main') --}}
        {{ $slot }}

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0
            </div>
        </footer>
    </div>
    
    <script src="{{asset('/assets/vendor/adminlte/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/adminlte/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/adminlte/adminlte.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/sweetalert/sweetalert2@10.js')}}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    <script>
        $(document).ready(function(){
            $('.js-btn--delete').on('click', function(ev){
                ev.preventDefault()
                ev.stopPropagation()
                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent().click()
                        }
                    })
            })
        })
    </script>
    @stack('page-js')
</body>
</html>