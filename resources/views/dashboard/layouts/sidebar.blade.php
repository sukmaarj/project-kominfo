<nav id="sidebarMenu" class="col-12 col-md-4 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <i data-feather="home" width="20"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('form*') ? 'active' : '' }}" href="/dashboard/form">
                    <span data-feather="file-text" width="20"></span>
                    Form Pengajuan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/data*') ? 'active' : '' }}" href="/dashboard/data">
                    <span data-feather="file" width="20"></span>
                    Data Pengajuan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
                    <span data-feather="user" width="20"></span>
                    Profile
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/status*') ? 'active' : '' }}" href="/dashboard/status">
                    <span data-feather="file" width="20"></span>
                    Data Pengajuan dan Status
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/admin*') ? 'active' : '' }}" aria-current="page" href="/dashboard/admin">
                    <span data-feather="users" width="20"></span>
                    Data User
                </a>
            </li>

        </ul>
        @endcan
    </div>
</nav>