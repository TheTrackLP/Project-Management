<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <hr>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Dashboard
            </a>
            <hr>
            <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}"
                href="{{ route('projects.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-diagram-project"></i></div>
                Projects
            </a>
            <hr>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Tasks
            </a>
            <hr>
            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Teams/Users
            </a>
            <hr>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                Calendar
            </a>
            <hr>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bars"></i></div>
                Reports
            </a>
            <hr>
            <a class="nav-link {{ request()->routeIs('cat.*') ? 'active' : '' }}" href="{{ route('cat.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                Category
            </a>
            <hr>
            <a class="nav-link {{ request()->routeIs('desig.*') ? 'active' : '' }}" href="{{ route('desig.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                Designation
            </a>
            <hr>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                Settings
            </a>
            <hr>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>