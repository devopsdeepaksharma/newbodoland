<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-assets/img/adminsite-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bodoland Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{  Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
              </li>
@role('CSO')
<li class="nav-header">Projects</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
       Projects
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    
    <li class="nav-item">
      <a href="{{route('cso.projectlist')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Assigned Project</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('cso.approvedprojectdetail')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Approved Project</p>
      </a>
    </li>
  </ul>
</li>
@endrole
          <!-- Role and Permission -->
          @role('Admin')
          <!-- Projects -->
          <li class="nav-header">Projects</li>
          <li class="nav-item">
              <a href="{{ route('projects.index') }}" class="nav-link {{ Route::is('projects.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                  <p>Projects</p>
              </a>
            </li>
           <!-- Second -->
           <li class="nav-header">Role & Permission</li>
          
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                  <p>Registered CSO List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('roles.index') }}" class="nav-link {{ Route::is('roles.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-play"></i>
                  <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('permissions.index') }}" class="nav-link {{ Route::is('permissions.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-lock"></i>
                  <p>Permission</p>
              </a>
            </li>
            
            
            @endrole
            <!-- Setting -->
          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Change Password</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>