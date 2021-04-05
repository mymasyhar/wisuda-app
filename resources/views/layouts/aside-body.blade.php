<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="../" class="logo">
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

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="{{ asset('style/octopus/assets/images/!logged-user.jpg') }}" alt="Joseph Doe"
                                class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                            <span class="name">John Doe Junior</span>
                            <span class="role">administrator</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-signin.html"><i
                                        class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title text-primary">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                        data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>

                <hr class="separator" />

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">

                            @role('mahasiswa')
                            <div class="sidebar-widget widget-stats">
                                <div class="widget-header">
                                    <h6 class="text-primary">Mahasiswa</h6>
                                    <div class="widget-toggle">+</div>
                                </div>
                            </div>

                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="index.html">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Registrasi</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="index.html">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Unggah Berkas</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-main">
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-copy" aria-hidden="true"></i>
                                        <span>Penjadwalan</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="pages-signup.html">
                                                Pengambilan
                                            </a>
                                        </li>

                                        <li>
                                            <a href="pages-signup.html">
                                                Pengembalian
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endrole
                        </nav>

                        <hr class="separator" />

                        @role('admin')
                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6 class="text-primary">Administrasi</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                        </div>
                        @endrole

                        @hasanyrole('admin|superadmin')
                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Verifikasi Berkas</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Kelengkapan Wisuda</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Arsip</span>
                                </a>
                            </li>
                        </ul>
                        @endhasanyrole

                        <hr class="separator" />

                        @role('superadmin')
                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6 class="text-primary">Super Admin</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                            </div>
                        </div>

                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Set Periode Wisuda</span>
                                </a>
                            </li>

                            {{-- <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Verifikasi Berkas</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Kelengkapan Wisuda</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Arsip</span>
                                </a>
                            </li>
                        </ul> --}}
                            @endrole
                    </div>
                </div>

            </aside>
