<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{appName()}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href=""{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset('images/bg1.jpg') }}');background-size: cover; background-position: center; height: 100vh; width: 100vw;">
    <div class="login-box {{ setFont() }}">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center" style="background-color: #3498db">
                <a href="#" class="h4 text-white"><b>{{appName()}}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg" style="color:#3498db"> {{ trans('message.authentication.login.sign_in_message') }}
                </p>

                <form method="POST" action="{{ route('login') }}" class="needs-validation" role="form" novalidate
                    data-toggle="validator">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror engText"
                            name="identity" value="{{ old('identity') }}" required autocomplete="identity"
                            placeholder="{{ trans('message.authentication.login.user_name_or_email_address') }}"
                            autofocus required>


                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            {{ trans('message.authentication.login.username_required') }}

                        </div>

                        @if (session('message'))
                            <span class="text-danger" role="alert">
                                <strong> {{ session('message') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="{{ trans('message.authentication.login.password') }}" required
                            autocomplete="current-password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            {{ trans('message.authentication.login.password_required') }}
                        </div>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       
                    </div>
                    @if (session('password_incorrect'))
                        <div class="text-danger" style="margin-top: -13px;" role="alert">
                            <strong> {{ session('password_incorrect') }}</strong>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" name="rememberme" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}> <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock"></i>
                                {{ trans('message.authentication.login.sign_in') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> --}}
                {{-- <p class="mb-0">
                    <a href="{{url('/register')}}" class="text-center">Register</a>
                </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
