<!doctype html>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@lang('label.LOGIN')</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('public/css/themify-icons.css') }}" >
        <link rel="stylesheet" href="{{ asset('public/css/flag-icon.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('public/css/cs-skin-elastic.css') }}" >

        <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" >

        <link href='{{ asset('public/css/css.css') }}' rel='stylesheet' type='text/css'>
        <script src="{{ asset('public/js/jquery-3.5.1.min.js') }}"></script>



    </head>

    <body class="bg-dark">


        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="login-form">
                        
                        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label>@lang('label.USERNAME')</label>
                            {!!Form::text('username', null, ['class' => ($errors->has('username')) ? 'form-control is-invalid' : 'form-control', 'id' => 'username',  'placeholder' => 'Enter username', 'required', 'autofocus']) !!}

                            <!--<input type="text" class="form-control" placeholder="Username">-->
                        </div>
                        <div class="form-group">
                            <label>@lang('label.PASSWORD')</label>
                            {!!Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control', 'id' => 'password',  'placeholder' => 'Enter password', 'required', 'autofocus']) !!}

                            <!--<input type="password" class="form-control" placeholder="Password">-->
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> @lang('label.REMEMBER')
                            </label>
                            <label class="pull-right">
                                <a href="#">@lang('label.FORGOTTEN_PASSWORD')</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">@lang('label.SIGN')</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>@lang('label.SIGN_IN_WITH_FACEBOOK')</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>@lang('label.SIGN_IN_WITH_TWITTER')</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> @lang('label.SIGN_UP_HERE')</a></p>
                        </div>
                        {!! Form::close() !!}
                        <!--</form>-->
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
