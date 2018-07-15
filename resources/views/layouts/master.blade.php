<!DOCTYPE HTML>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ URL('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ URL('assets/scss/style.css') }}">
    <link href="{{ URL('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @yield('add-css')
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Simulasi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="#">Best OTT</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="#">Best Add On</a></li>
                            <li class="sub-menu children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Minipack</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>STB Tambahan</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Telepon Mania</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Upgrade Speed</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Realisasi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="#">Best OTT</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="#">Best Add On</a></li>
                            <li class="sub-menu children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Minipack</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>STB Tambahan</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Telepon Mania</a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece"></i>Upgrade Speed</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ URL('images/user.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            @if(Auth::check())
                            <a class="nav-link">   Welcome, {{ Auth::user()->name }}</a>
                            <a class="menu-icon fa fa-sign-out" href="{{ url('/admin/logout') }}">    Logout</a>
                            @else
                            <a class="menu-icon fa fa-sign-in" href="{{ URL('/login') }}"> Login</a><br>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </header>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('title')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">@yield('right_title')</li>
                        </ol>
                    </div>
                </div>
            </div> 
        </div>
        <div class="content mt-3">
           @yield('content')
        </div>
    </div>



    <script src="{{ URL('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ URL('assets/js/plugins.js') }}"></script>
    <script src="{{ URL('assets/js/main.js') }}"></script>


    {{-- <script src="{{ URL('assets/js/lib/chart-js/Chart.bundle.js') }}"></script> --}}
    {{-- <script src="{{ URL('assets/js/dashboard.js') }}"></script> --}}
    {{-- <script src="{{ URL('assets/js/widgets.js') }}"></script> --}}
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    @yield('additional-script')
</body>
</html>
