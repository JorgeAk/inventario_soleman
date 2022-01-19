<!DOCTYPE html>
<html lang="en">

@include('include.login_head')

<body class="skin-blue card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('res/assets/images/background/login-register.jpg')}}">
            <div class="login-box card">
                <div class="card-body">
                <img src="{{asset('res/assets/images/background/logo1.png')}}" alt="homepage" style="display:block; margin:auto; width: 88px; " class="" />
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="box-title m-b-20 text-center"><b>Login</b></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required="" name="email" autocomplete="email" placeholder="Correo" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Contraseña" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Recordarme</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Entrar</button>
                            </div>
                        </div>
                        
                    </form>

                    <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Correo" name="email" value="{{ $email ?? old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>



    @include('include.login_footer')

</body>

</html>