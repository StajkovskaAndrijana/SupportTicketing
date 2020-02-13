<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Support Ticketing | Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <span><b>Support Ticketing</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post" action="{{ url('/register') }}">
                    @csrf

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>


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
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
