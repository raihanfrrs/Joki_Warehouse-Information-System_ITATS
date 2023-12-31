<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
        <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
            <i class="ti ti-search ti-md me-2"></i>
            <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
            </a>
        </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- Style Switcher -->
        <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
            <i class="ti ti-md"></i>
            </a>
        </li>
        <!--/ Style Switcher -->

        <!-- Quick links  -->
        {{-- <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a
            class="nav-link dropdown-toggle hide-arrow"
            href="javascript:void(0);"
            data-bs-toggle="dropdown"
            data-bs-auto-close="outside"
            aria-expanded="false">
            <i class="ti ti-layout-grid-add ti-md"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
            <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                <a
                    href="javascript:void(0)"
                    class="dropdown-shortcuts-add text-body"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add shortcuts"
                    ><i class="ti ti-sm ti-apps"></i
                ></a>
                </div>
            </div>
            <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-calendar fs-4"></i>
                    </span>
                    <a href="app-calendar.html" class="stretched-link">Calendar</a>
                    <small class="text-muted mb-0">Appointments</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-file-invoice fs-4"></i>
                    </span>
                    <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                    <small class="text-muted mb-0">Manage Accounts</small>
                </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-users fs-4"></i>
                    </span>
                    <a href="app-user-list.html" class="stretched-link">User App</a>
                    <small class="text-muted mb-0">Manage Users</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-lock fs-4"></i>
                    </span>
                    <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                    <small class="text-muted mb-0">Permission</small>
                </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-chart-bar fs-4"></i>
                    </span>
                    <a href="index.html" class="stretched-link">Dashboard</a>
                    <small class="text-muted mb-0">User Profile</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-settings fs-4"></i>
                    </span>
                    <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                    <small class="text-muted mb-0">Account Settings</small>
                </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-help fs-4"></i>
                    </span>
                    <a href="pages-help-center-landing.html" class="stretched-link">Help Center</a>
                    <small class="text-muted mb-0">FAQs & Articles</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class="ti ti-square fs-4"></i>
                    </span>
                    <a href="modal-examples.html" class="stretched-link">Modals</a>
                    <small class="text-muted mb-0">Useful Popups</small>
                </div>
                </div>
            </div>
            </div>
        </li> --}}
        <!-- Quick links -->

        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a
            class="nav-link dropdown-toggle hide-arrow"
            href="javascript:void(0);"
            data-bs-toggle="dropdown"
            data-bs-auto-close="outside"
            aria-expanded="false">
            <i class="ti ti-trash ti-md"></i>
                <span class="badge bg-danger rounded-pill badge-notifications d-none" id="label-total-account-deleted-count"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Sampah</h5>
                </div>
            </li>
            <div id="data-account-deleted-notification"></div>
            </ul>
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                @if (auth()->user()->admin->getFirstMediaUrl('admin'))
                    <img src="{{ auth()->user()->admin->getFirstMediaUrl('admin') }}" alt="{{ auth()->user()->admin->slug }}" class="h-auto rounded-circle">    
                @else
                    {!! generateAvatar(auth()->user()->admin->name) !!}
                @endif
            </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                        @if (auth()->user()->admin->getFirstMediaUrl('admin'))
                            <img src="{{ auth()->user()->admin->getFirstMediaUrl('admin') }}" alt="{{ auth()->user()->admin->slug }}" class="h-auto rounded-circle">    
                        @else
                            {!! generateAvatar(auth()->user()->admin->name) !!}
                        @endif
                    </div>
                    </div>
                    <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{ auth()->user()->admin->name }}</span>
                    <small class="text-muted">Admin</small>
                    </div>
                </div>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">Profil Saya</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="">
                <i class="ti ti-settings me-2 ti-sm"></i>
                <span class="align-middle">Pengaturan</span>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="ti ti-logout me-2 ti-sm"></i>
                <span class="align-middle">Keluar</span>
                </a>
            </li>
            </ul>
        </li>
        <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input
        type="text"
        class="form-control search-input container-xxl border-0"
        placeholder="Search..."
        aria-label="Search..." />
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>