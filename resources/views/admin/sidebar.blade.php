<div class="sidebar" data-color="rose" data-background-color="black"
    data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="{{ url('/admin') }}" class="simple-text logo-mini bg-secondary" style="border-radius: 35%">
            E
        </a>
        <a href="{{ url('/admin') }}" class="simple-text logo-normal">
            E-MART
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if (Auth::user()->image && File::exists(public_path("upload/image/profile/".Auth::user()->image)))
                <img src="{{ asset('upload/image/profile/'.Auth::user()->image) }}" class="rounded-circle img-fluid" />
                @else
                <img class="rounded-circle" src="{{ asset('frontend/img/demo.png') }}" alt="" />
                @endif
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/profile') }}">
                                <span class="sidebar-mini"> <i class="material-icons">person</i> </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @can('dashboard.view')
            <li class="nav-item {{ Request::is('admin') ? 'active':'' }}  ">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            @endcan
            @can('category.view')
            <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/category') }}">
                    <i class="material-icons">category</i>
                    <p>Category</p>
                </a>
            </li>
            @endcan
            @can('product.view')
            <li class="nav-item {{ Request::is('admin/product*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/product') }}">
                    <i class="material-icons">inventory</i>
                    <p>Products</p>
                </a>
            </li>
            @endcan
            @can('order.view')
            <li class="nav-item {{ Request::is('admin/order*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/order') }}">
                    <i class="material-icons">list_alt</i>
                    <p>Orders</p>
                </a>
            </li>
            @endcan
            @can('role.view')
            <li class="nav-item {{ Request::is('admin/role*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/role') }}">
                    <i class="material-icons">group</i>
                    <p>Roles</p>
                </a>
            </li>
            @endcan
            @can('user.view')
            <li class="nav-item {{ Request::is('admin/user*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="material-icons">group</i>
                    <p>Users</p>
                </a>
            </li>
            @endcan
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>