<!DOCTYPE html>
<html lang="en">
<head>
@include('adminlayouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
    @include('adminlayouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('adminlayouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

 @include('adminlayouts.footer')

</div>
<!-- ./wrapper -->

@include('adminlayouts.scripts')
</body>
</html>
