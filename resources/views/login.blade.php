
<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ URL('/images/logo2.png') }}" type="image/x-icon">
    <title>Login</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ URL('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    @if(isset(Auth::user()->email))
                        <script>window.location="/admin";</script>
                    @endif

                    @if ($message = Session::get('error'))
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                       </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                         </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ URL('/login/checklogin') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       <!-- <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ URL('js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ URL('js/popper.min.js') }}"></script>
    <script src="{{ URL('js/plugins.js') }}"></script>
    <script src="{{ URL('js/main.js') }}"></script>


</body>
</html>


