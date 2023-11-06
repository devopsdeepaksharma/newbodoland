


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BRLF | Partners</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
               <a href="https://www.brlf.in/" target="_blank" class="navbar-brand">
                <img src="{{asset('admin-assets/img/logo/logo1.png')}}" alt="AdminLTE Logo"  style="width:40%; height:auto;">
               </a>
               <form action="{{ route('logout') }}" method="post">
                @csrf
                    <input type="submit" value="Logout" class="btn-primary btn btn-sm">
                </form>
            </div>
         </nav>
         <!-- /.navbar -->

    <!-- Main content -->
    <section class="content">
     
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>

<div style="height:50px; clear:both;"></div>
<div class="container">
<div style="height:10px; clear:both;"></div>
    <center>
      <h2>"Transforming Lives and Livelihoods in Bodoland"</h2>
      <small style="font-weight:bold;">30 June 2022 to 30 June 2026</small>
   </center>
   <div style="height:20px; clear:both;"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- /.content-wrapper -->


</body>
</html>

