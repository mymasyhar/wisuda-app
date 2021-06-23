<header class="header" style="position: static">
    <div class="logo-container">
        <a href="/" class="logo">
            <img src="{{ asset('style/octopus/assets/images/logo.png') }}" height="35" alt="JSOFT Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
            data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">
        <span class="separator"></span>
        @auth
            <a href="{{ route('general.dashboard') }}" class="mb-xs mt-xs mr-xs btn btn-warning">Dashboard</a>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="mb-xs mt-xs mr-xs btn btn-warning">Login</a>
        @endguest
    </div>
    <!-- end: search & user box -->
</header>
