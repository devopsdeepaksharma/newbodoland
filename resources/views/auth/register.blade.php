<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bodolang Admin | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css')}}">
  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }

    ul {
  list-style: none;
}

li {
  display: inline-block;
  margin-right: 10px; /* add spacing between items */
}

.bottom-card-body{
    padding : 0.25rem!important;
}
  </style>
</head>
<body style="background-color:#e9ecef;">
    
    <div style="height:35px; clear:both;"></div>

<div class="container text-center">
<div class="row">
    <div class="col-4"></div>
        <div class="col-6">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="#" class="h1"><b>Registration</b>&nbsp;Form</a>
                    </div>

                    <div class="card-body bottom-card-body">
                        <p class="login-box-msg">New CSO Registration</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- organisation name -->
                            <div class="input-group mb-3">
                                <input id="org_name" type="text" class="form-control @error('org_name') is-invalid @enderror" name="org_name" value="{{ old('org_name') }}" required autocomplete="org_name" autofocus placeholder="Name of Organisation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('org_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <!-- organisation short name -->
                            <div class="input-group mb-3">
                            <input id="org_short_name" type="text" class="form-control @error('org_short_name') is-invalid @enderror" name="org_short_name" value="{{ old('org_short_name') }}" required autocomplete="org_short_name" autofocus placeholder="Short name of Organisation">
                            <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                            @error('org_short_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>

                            <!-- email -->
                            <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>

                    <!-- Mobile -->
                    <div class="input-group mb-3">
                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus  placeholder="Mobile">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <!-- Pan Number -->
                    <div class="input-group mb-3">
                    <input id="pan" type="text" class="form-control @error('pan') is-invalid @enderror" name="pan" value="{{ old('pan') }}" required autocomplete="pan" autofocus  placeholder="Organisation Pan Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-credit-card"></span>
                        </div>
                    </div>
                    @error('pan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <!-- password  -->
                    <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>
                    <!-- Retype Password -->
                    <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>

                    <!-- agree -->
                    <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <div class="col-6">
                    <a href="{{route('login')}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <ul class="text-center">
                    <br>
                    <li><a href="{{route('login')}}" target="_blank" >&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
                    <li><a href="{{route('password.request')}}" target="_blank" > Forget Password</a></li>
                </ul>
                
                </div>
        <!-- /.card-body -->
        </div>
        <div class="col-4"></div>
  <!-- /.card -->
</div>

</div>
 




<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-assets/js/adminlte.min.js')}}"></script>
<script src="{{ asset('admin-assets/dist/js/demo.js')}}"></script>
</body>
</html>
