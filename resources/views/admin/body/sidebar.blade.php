<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Main</div>
            <a class="nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}" href="{{ route('admins.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}"
                href="{{ route('projects.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-diagram-project"></i></div>
                Projects
            </a>
            <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Tasks
            </a>
            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Teams/Users
            </a>

            <div class="sb-sidenav-menu-heading">Tools</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                Calendar
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports"
                aria-expanded="false" aria-controls="collapseReports">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bars"></i></div>
                Reports
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseReports" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Monthly</a>
                    <a class="nav-link" href="#">Yearly</a>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Management</div>
            <a class="nav-link {{ request()->routeIs('cat.*') ? 'active' : '' }}" href="{{ route('cat.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                Category
            </a>
            <a class="nav-link {{ request()->routeIs('desig.*') ? 'active' : '' }}" href="{{ route('desig.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                Designation
            </a>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                Settings
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>