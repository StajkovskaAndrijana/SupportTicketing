<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Support Ticketing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Well Done!</h5>
            {{Session::get('success')}}
        </div>
        <div class="login-logo">
            <span><b>Support Ticketing</b></span>
        </div>


        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="post" action="{{ url('/login') }}">
                @csrf

                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                   @endif
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
            <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
