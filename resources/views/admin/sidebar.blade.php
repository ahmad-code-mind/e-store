<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="#" class="simple-text logo-normal">
            E-store
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('/*') ? 'active':'' }}  ">
                <a class="nav-link" href="{{ url('/') }}">
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
            @role('admin')
            <li class="nav-item {{ Request::is('admin/user*') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="material-icons">group</i>
                    <p>Users</p>
                </a>
            </li>
            @endrole
        </ul>
    </div>
</div>