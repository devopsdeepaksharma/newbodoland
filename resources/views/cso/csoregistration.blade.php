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
               <a href="#" class="navbar-brand">
               <img src="{{asset('admin-assets/img/logo/logo1.png')}}" alt="AdminLTE Logo"  style="width:40%; height:auto;">
               </a>
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt nav-icon"></i> Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </li>
               </ol>
              
            </div>
         </nav>
         <!-- /.navbar -->

    <!-- Main content -->
    <section class="content">
     
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div style="height:100px; clear:both;"></div>
      <div class="error-page">
        <h2 class="headline text-warning"> </h2>
        <div class="">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Hi! <b>{{$getUserData->name}}</b></h3>
          <p>
            Thanks for your Intrest in Our Organisation. I request to you, 
            Please complete your registration process by <a href="{{route('csoregistration')}}">Click here..</a> or You have any query. Please write to us at help@brlf.com
          </p>
        </div>
        <!-- /.error-content -->
      </div>
    </div>
  </div>
</div>

      <!-- /.content-wrapper -->


</body>
</html>
