<section class="navbar">
    <div class="navbar_inner">
        <a href="{{ route('site.home') }}"><img class="logo" src="{{ asset('web_assets/images/logo.png') }}"
                alt="Logo"></a>
        <button class="btn shadow-none"><img src="{{ asset('web_assets/images/icon101.png') }}" data-bs-toggle="offcanvas"
                data-bs-target="#sidebar" aria-controls="sidebar" alt="Sidebar"></button>
    </div>
</section>

<div class="offcanvas offcanvas-end sidebar" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div>
            <ul class="sidebar_list">
                <a href="{{ route('site.home') }}">
                    <li class="{{ Request::routeIs('site.home') ? 'active' : '' }}">Home</li>
                </a>
                <a href="{{ route('site.game.rules') }}">
                    <li class="{{ Request::routeIs('site.game.rules') ? 'active' : '' }}">Game Rules</li>
                </a>
                <a href="{{ route('site.register') }}">
                    <li class="{{ Request::routeIs('site.register') ? 'active' : '' }}">Become a member</li>
                </a>
                <a href="{{ route('site.privacy.policy') }}">
                    <li class="{{ Request::routeIs('site.privacy.policy') ? 'active' : '' }}">Privacy Policy</li>
                </a>
                <a href="{{ route('site.terms.and.condition') }}">
                    <li class="{{ Request::routeIs('site.terms.and.condition') ? 'active' : '' }}">Terms &amp;
                        Conditions</li>
                </a>
                {{-- If logged in --}}
                @auth
                    <a href="{{ route('user.dashboard') }}">
                        <li>My Account</li>
                    </a>
                    <a href="{{ route('user.logout') }}">
                        <li>Logout</li>
                    </a>
                @endauth
                {{-- If not logged in --}}
                @guest
                    <a href="{{ route('site.login') }}">
                        <li class="{{ Request::routeIs('site.login') ? 'active' : '' }}">Login</li>
                    </a>
                    <a href="{{ route('admin.login') }}">
                        <li>Admin Login</li>
                    </a>
                @endguest
            </ul>
        </div>
    </div>
</div>
