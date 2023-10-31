  @extends('adminlayouts.app')
  @section('content')
  <style>
.info-box-number {
    font-size: 20px;
}


div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px) {
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
  </style>
  @role('CSO')
  @include('admin.csodashboard')
  @endrole
  @role('Admin')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">

                  <h1>SPMU Dashboard :</h1>
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
              <div class="col-md-6">
                  <div class="card card-primary card-outline">
                      <div class="card-body">
                          <h1>Project Title : </h1> <span style="font-size:20px; font-weight:bold;">Transforming Lives
                              and Livelihoods of Bodoland</span>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="card card-info card-outline">
                      <div class="card-body">
                          <h1>Project Duration : </h1> <span style="font-size:20px; font-weight:bold;"><i
                                  class="fa fa-time"></i> 4 Years
                      </div>
                  </div>
              </div>

              {{--
              <div class="col-lg-3 col-6">
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
                      <a href="{{ route('projects.index') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
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
                      echo \App\Models\User::role('CSO')->where('created_at',
                      \Carbon\Carbon::now()->subDay())->count();
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
      --}}
      </div>
      <!-- /.row -->
      <hr>
      <div style="height:20px; clear:both;"></div>

      <div class="row">

          <!-- /.col -->
      </div>

      <!-- Main row -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="card card-info">
                          <div class="card-header">
                              <h4>All Data</h4>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="col-md-12">
                                  <div class="info-box shadow-lg">
                                      <span class="info-box-icon bg-info"><i class="fa fa-home"></i></span>
                                      <div class="info-box-content">
                                          <span class="info-box-text">Total Districts</span>
                                          @php
                                            $districtCount = \App\Models\District::count();
                                          @endphp
                                          <span class="info-box-number">{{ $districtCount }}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-12">
                                  <div class="info-box shadow-lg">
                                      <span class="info-box-icon bg-success"><i class="	fa fa-cube"></i></span>
                                      <div class="info-box-content">
                                      @php
                                            $blockCount = \App\Models\Block::count();
                                            @endphp
                                          <span class="info-box-number">{{ $blockCount }}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-12">
                                  <div class="info-box shadow-lg">
                                      <span class="info-box-icon bg-warning"><i class="fas fa-dolly-flatbed"></i></span>
                                      <div class="info-box-content">
                                      @php
                                            $vcdcCount = \App\Models\VillageCouncilDevelopmentCommittee::count();
                                          @endphp
                                          <span class="info-box-number">{{ $vcdcCount }}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-12">
                                  <div class="info-box shadow-lg">
                                      <span class="info-box-icon bg-danger"><i class="fa fa-map-pin"></i></span>
                                      <div class="info-box-content">
                                      @php
                                            $villageCount = \App\Models\Village::count();
                                          @endphp
                                          <span class="info-box-number">{{ $villageCount }}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <div class="col-md-12">
                                  <div class="info-box shadow-lg">
                                      <span class="info-box-icon bg-primary"><i class="fas fa-house-user"></i></span>
                                      <div class="info-box-content">
                                          <span class="info-box-text">Total Household</span>
                                          <span class="info-box-number">500</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                          </div>
                          <!-- /.card-body -->
                      </div>

                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-12 col-lg-6">
                      <div class="card">
                          <div class="card-header text-white bg-info">
                              <h4>Project Location</h4>
                          </div>
                          <div class="card-body">
                              <div id="map" style="height: 500px; width: 100%;"></div>
                          </div>
                      </div>
                  </div>
                  <!-- /.col-md-6 -->
              </div>

              <hr>
              <div style="height:20px; clear:both;"></div>
              <div class="row">
                  <div class="col-md-12 col-lg-12">
                      <div class="card">
                          <div class="card-header text-white bg-info">
                              <h4>Goverment Partner</h4>
                          </div>
                          <div class="card-body">
                              <div class="responsive">
                                  <div class="gallery">
                                      <a target="_blank" href="https://bodoland.gov.in/">
                                          <img src="{{Storage::url('/assets/GovermentPartner/btc-logo.png')}}"
                                              alt="Cinque Terre" width="600" height="400">
                                      </a>
                                      <div class="desc">Bodoland Territorial Region</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Funding Partners -->
                  <div class="col-md-12 col-lg-12">
                      <div class="card">
                          <div class="card-header text-white bg-info">
                              <h4>Funding Partner</h4>
                          </div>
                          <div class="card-body">
                              <div class="responsive">
                                  <div class="gallery">
                                      <a target="_blank" href="https://azimpremjifoundation.org/">
                                          <img src="{{Storage::url('/assets/FundingPartner/FP1.png')}}"
                                              alt="Cinque Terre" width="600" height="400">
                                      </a>
                                      <div class="desc">Azim Premji Foundation</div>
                                  </div>
                              </div>
                              <div class="responsive">
                                  <div class="gallery">
                                      <a target="_blank" href="https://bodoland.gov.in/">
                                          <img src="{{Storage::url('/assets/FundingPartner/FP2.png')}}"
                                              alt="Cinque Terre" style="width:283px; height:134px;">
                                      </a>
                                      <div class="desc">BRLF</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Implemeting Partner -->
                  <div class="col-md-12 col-lg-12">
                      <div class="card">
                          <div class="card-header text-white bg-info">
                              <h4>Implementing Partner</h4>
                          </div>
                          <div class="card-body">

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
    var locations = [{
            'latitude': 24.6637,
            'longitude': 93.9063
        },
        {
            'latitude': 26.7509,
            'longitude': 94.2037
        }
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