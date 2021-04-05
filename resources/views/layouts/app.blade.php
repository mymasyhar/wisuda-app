<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Sistem Informasi Pendaftaran Wisuda</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('style/octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet"
        href="{{ asset('style/octopus/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('style/octopus/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />

    <link rel="stylesheet" href="{{ asset('style/octopus/assets/vendor/morris/morris.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('style/octopus/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('style/octopus/assets/vendor/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('style/octopus/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/stylesheets/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style/octopus/assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('style/octopus/assets/vendor/modernizr/modernizr.js') }}"></script>

</head>

<body>
    @include('sweetalert::alert')
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
                        <div class="profile-info">
                            <span class="name">{{ auth()->user()->name }}</span>
                            <span class="role">{{ auth()->user()->role }}</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"><i
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
                        <a href="/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>

                <hr class="separator" />

                <div class="nano">
                    <div class="nano-content">
                        @role('mahasiswa')
                        <nav id="menu" class="nav-main" role="navigation">

                            <div class="sidebar-widget widget-stats">
                                <div class="widget-header">
                                    <h6 class="text-primary">Mahasiswa</h6>
                                    <div class="widget-toggle">+</div>
                                </div>
                            </div>

                            <hr class="separator" />

                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="/students/register">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Registrasi</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="/students/file-upload">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Unggah Berkas</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-main">
                                <li class="nav-parent nav-active">
                                    <a>
                                        <i class="fa fa-copy" aria-hidden="true"></i>
                                        <span>Penjadwalan</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="/students/pengambilan">
                                                Pengambilan
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/students/pengembalian">
                                                Pengembalian
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        @endrole

                        {{-- <hr class="separator" /> --}}

                        @role('admin')
                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6 class="text-primary">Petugas Administrasi</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                        </div>

                        <hr class="separator" />

                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a href="/admin/verification">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Verifikasi Berkas</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="/admin/kelengkapan">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Kelengkapan Wisuda</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="/admin/archive">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Arsip</span>
                                </a>
                            </li>
                        </ul>
                        @endrole

                        {{-- <hr class="separator" /> --}}

                        @role('superadmin')
                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6 class="text-primary">Super Admin</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                            </div>
                        </div>
                        {{-- <hr class="separator" /> --}}

                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a href="/periodic">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Set Periode Wisuda</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="/admin/verification">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Verifikasi Berkas</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="/admin/kelengkapan">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Kelengkapan Wisuda</span>
                                </a>
                            </li>

                            <li class="nav-active">
                                <a href="/admin/archive">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Arsip</span>
                                </a>
                            </li>
                        </ul>
                        @endrole
                    </div>
                </div>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>{{ $title ?? 'Sistem A' }}</h2>

                    <div class="right-wrapper">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>{{ $title ?? 'Sistem A' }}</span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>

                @yield('content')

                <!-- start: page -->
            </section>
        </div>
        </aside>
    </section>

    <!-- Vendor -->
    <script src="{{ asset('style/octopus/assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}">
    </script>
    <script src="{{ asset('style/octopus/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{ asset('style/octopus/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/raphael/raphael.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/morris/morris.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/gauge/gauge.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/snap-svg/snap.svg.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js') }}">
    </script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js') }}">
    </script>
    <script src="{{ asset('style/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js') }}">
    </script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('style/octopus/assets/javascripts/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('style/octopus/assets/javascripts/theme.custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('style/octopus/assets/javascripts/theme.init.js') }}"></script>


    <!-- Examples -->
    <script src="{{ asset('style/octopus/assets/javascripts/dashboard/examples.dashboard.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}">
    </script>


    <script src="{{ asset('style/octopus/assets/vendor/select2/select2.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}">
    </script>
    <script
        src="{{ asset('style/octopus/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script src="{{ asset('style/octopus/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>


    <script src="{{ asset('style/octopus/assets/javascripts/tables/examples.datatables.default.js') }}"></script>
    <script src="{{ asset('style/octopus/assets/javascripts/tables/examples.datatables.row.with.details.js') }}">
    </script>
    <script src="{{ asset('style/octopus/assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>
    @yield('js')

</body>

</html>
