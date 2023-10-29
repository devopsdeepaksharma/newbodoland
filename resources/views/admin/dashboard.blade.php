  @extends('adminlayouts.app')
    @section('content')
    @role('CSO')
       @include('admin.csodashboard')
    @endrole
    @role('Admin')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SMPU Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                    echo \App\Models\Project::where('status',1)->count();   
                  @endphp
                </h3>
                <p>Total Project</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('projects.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  @php
                   echo \App\Models\User::role('CSO')->count();   
                  @endphp
                </h3>

                <p>Total Registered CSO</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  @php
                   echo \App\Models\User::role('CSO')->where('created_at', \Carbon\Carbon::now()->subDay())->count();   
                  @endphp
                </h3>

                <p>New CSO Registrations Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  @php
                   echo \App\Models\User::role('CSO')->where('registration_complete', 'P')->count();   
                  @endphp
                </h3>

                <p>Total Draft CSO</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Projects Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Project Title</th>
                      <th>Location</th>
                      <th style="width: 40px">Tenure</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Save Water</td>
                      <td><p>Assam</p>
                      </td>
                      <td><span class="badge bg-primary">7 Months</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Save Girls</td>
                      <td><p>Assam</p>
                      </td>
                      <td><span class="badge bg-warning">7 Months</span></td>
                    </tr>
                    <tr>
                    <tr>
                      <td>3.</td>
                      <td>Women Livelihood</td>
                      <td><p>Assam</p>
                      </td>
                      <td><span class="badge bg-danger">7 Months</span></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">CSO Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>CSO Name</th>
                      <th>Location</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Wipro Foundation</td>
                      <td><p>Assam</p>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>BPL Foundation</td>
                      <td><p>Assam</p>
                      </td>
                     
                    </tr>
                    <tr>
                    <tr>
                      <td>3.</td>
                      <td>Tata Trust</td>
                      <td><p>Assam</p>
                      </td>
                      
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>

        <div class="row">
          <div class="col-md-12 col-lg-6 ">
            <div class="card">
                <div class="card-header text-white" style="background-color: #6610f2"><h4>Our Riding Charters</h4></div>
                <div class="card-body">
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endrole
    @endsection

    @section('scripts')
    <script type="text/javascript">
      function initializeMap() {
          const myLatLng = {
              lat: 22.2734719,
              lng: 70.7512559
          };
          const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 5,
              center: myLatLng,
          });
          var locations = [
            { 'latitude': 24.6637, 'longitude': 93.9063 },
            { 'latitude': 26.7509, 'longitude': 94.2037 }
          ];
          var infowindow = new google.maps.InfoWindow();
          var marker, i;
          var bounds = new google.maps.LatLngBounds();
          for (var location of locations) {
              var marker = new google.maps.Marker({
                  position: new google.maps.LatLng(location.latitude, location.longitude),
                  map: map
              });
              bounds.extend(marker.position);
              google.maps.event.addListener(marker, 'click', (function(marker, location) {
                  return function() {
                      infowindow.setContent(location.name);
                      infowindow.open(map, marker);
                  }
              })(marker, location));
  
          }
          map.fitBounds(bounds);
      }
      window.initializeMap = initializeMap;
  </script>
  
  <script type="text/javascript"
  src="https://maps.google.com/maps/api/js?key={{ config('app.GOOGLE_MAPS_API') }}&callback=initializeMap"></script>  
    @endsection