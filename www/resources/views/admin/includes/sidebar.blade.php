<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">4TeamFantasy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Registrations -->
        <li class="menu-item {{ Request::routeIs('admin.registrations') ? 'active' : '' }}">
            <a href="{{ route('admin.registrations') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-user-circle'></i>
                <div data-i18n="Analytics">Registrations</div>
            </a>
        </li>

        <!-- Logout -->
        <li class="menu-item">
            <a href="{{ route('admin.logout') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-power-off'></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li>
    </ul>
</aside>
