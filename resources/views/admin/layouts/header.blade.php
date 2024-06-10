<header class="navbar sticky-top navbar-dark sticky-top bg-dark flex-md-nowrap shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('dashboard') }}">Kaziranga Admin</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-light w-100 rounded-0 border-0 d-none d-md-block" type="text"
        placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 bg-danger text-white" href="{{ route('logout') }}"><i
                    class="bi bi-box-arrow-right"></i> Sign out</a>
        </div>
    </div>
</header>
