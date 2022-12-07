<div class="sidebar" data-color="rose" data-background-color="black"
    data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            ES
        </a>
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            E-store
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
            <li class="nav-item {{ Request::is('admin') ? 'active':'' }}  ">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/category') }}">
                    <i class="material-icons">category</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/product*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/product') }}">
                    <i class="material-icons">inventory</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/role*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/role') }}">
                    <i class="material-icons">group</i>
                    <p>Roles</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/user*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="material-icons">group</i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>