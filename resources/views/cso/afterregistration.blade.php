<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BRLF | Awaiting Approval</title>
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
               <a href="https://bodoland.gov.in/" class="navbar-brand">
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


<div style="height:150px; clear:both;"></div>
<div class="container">
<div style="height:10px; clear:both;"></div>
    <center>
      <h2>"Transforming Lives and Livelihoods in Bodoland"</h2>
      <small style="font-weight:bold;">30 June 2022 to 30 June 2026</small>
   </center>
   <div style="height:20px; clear:both;"></div>
   
<center><h3><i class="far fa-thumbs-up text-success"></i> Hi! <b>{{$getUserData->name}}</b></h3>
<div style="height:10px; clear:both;"></div>
        
        <div style="height:10px; clear:both;"></div>
        
        <center><p>Thank you for completing the profile. It is currently under review at the State Project Management Unit (SPMU).</p></center>
    </div>

      <!-- /.content-wrapper -->


</body>
</html>
