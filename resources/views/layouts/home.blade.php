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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    @include('layouts.nav')

    <script src="{{ URL('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ URL('assets/js/plugins.js') }}"></script>
    <script src="{{ URL('assets/js/main.js') }}"></script>


    <script src="{{ URL('assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ URL('assets/js/dashboard.js') }}"></script>
    <script src="{{ URL('assets/js/widgets.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ URL('assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>

    @yield('additional-script')
</body>
</html>
