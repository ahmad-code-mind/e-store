<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="#" class="simple-text logo-normal">
            E-store
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('/') ? 'active':'' }}  ">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('/categories') }}">
                    <i class="material-icons">category</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('') ? 'active':'' }} ">
                <a class="nav-link" href="#">
                    <i class="material-icons">content_paste</i>
                    <p>Table List</p>
                </a>
            </li>
        </ul>
    </div>
</div>