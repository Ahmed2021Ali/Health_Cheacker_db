<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ url('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">Dashbord Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('panels.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Panels</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('department.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('operation.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Operations</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('input.show')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show inputs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('role.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('permission.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('jobs')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Jobs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('failed_jobs')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Job Failed</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('backup.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Backup</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('log.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Logs </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
