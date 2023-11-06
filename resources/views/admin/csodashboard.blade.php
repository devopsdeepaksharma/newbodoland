<!-- Content Header (Page header) -->
<style>


.info-box{
    width: 100%;
}

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

.mypadding{
    padding : 0.25rem;
}
</style>
<div class="content-header">
    <div class="container-fluid">
        <div style="height:10px; clear:both;"></div>
        <center>
            <h2>"Transforming Lives and Livelihoods in Bodoland"</h2>
            <small style="font-weight:bold;">30 June 2022 to 30 June 2026</small>
        </center>
        <div class="row mb-2">

            <div class="col-sm-6">
                <!-- <h1 class="m-0">CSO Dashboard</h1> -->
            </div><!-- /.col -->
            {{--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>--}}
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    
  
    <div style="height:20px; clear:both;"></div>

    <center><h3 class="mb-2">Geography</h3></center><br>

    <!-- Main row -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-info">
                        <div class="card-header mypadding">
                            <h4>Project Geography   </h4>
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
                                        <span class="info-box-number">1</span>
                                       {{-- <span class="info-box-number">{{ $districtCount }}</span>--}}
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
                                        <span class="info-box-text">Total Block</span>
                                        @php
                                        $blockCount = \App\Models\Block::count();
                                        @endphp
                                        <span class="info-box-number">1</span>
                                        {{--<span class="info-box-number">{{ $blockCount }}</span>--}}
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
                                        <span class="info-box-text">Total VCDC</span>
                                        @php
                                        $vcdcCount = \App\Models\VillageCouncilDevelopmentCommittee::count();
                                        @endphp

                                        {{--<span class="info-box-number">{{ $vcdcCount }}</span>--}}
                                        <span class="info-box-number">1</span>
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
                                        <span class="info-box-text">Total Villages {{Auth::user()->id}}</span>
                                        @php
                                        $user = Auth::user()->id;
                                        $villageData = \App\Models\CsoProjectDetail::where('user_id','='. $user)->first();
                                        
                                        @endphp
                                       
                                        @if(!is_null($csoProjectDetailData))
                                        <span class="info-box-number">{{ $csoProjectDetailData->village_count }}</span>
                                        @endif
                                      
                                       
                                        
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
                                        @if(!is_null($csoProjectDetailData))
                                        <span class="info-box-number">{{$csoProjectDetailData->household_count}}</span>
                                        @endif
                                        
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
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header text-white bg-warning mypadding">
                            <h4>Project Location</h4>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 505px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-3">
                    <div class="card card-success">
                        <div class="card-header mypadding">
                            <h4>Project Partners</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                <h5>Government Partners</h5><hr>
                                <a target="_blank" href="https://bodoland.gov.in/">
                                        <img src="{{asset('/admin-assets/img/GovermentPartner/btc-logo2.png')}}" >
                                    </a>
                            </div>
                            <!-- /.col -->
                            <br>
                            <div class="col-md-12">
                            <h5>Funding Partners</h5><hr>
                                <a target="_blank" href="https://azimpremjifoundation.org/">
                                        <img src="{{asset('/admin-assets/img/FundingPartner/FP1new.png')}}" >
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a target="_blank" href="https://www.brlf.in/">
                                        <img src="{{asset('/admin-assets/img/FundingPartner/FP2new.png')}}" >
                                    </a>
                            </div>
                            <!-- /.col --><br>
                            <div class="col-md-12">
                            <h5>Implementing Partners</h5><hr>
                            <ul class="nav flex-column">
                  <li class="nav-item">
                    <a target="_blank" href="https://theant.org/en/">
                      <img src="{{asset('/admin-assets/img/ImplementingPartner/IP1new.png')}}" >
                  </a>
                  </li>
                  <li class="nav-item">
                    <a target="_blank" href="https://www.kabilindia.org/">
                      <img src="{{asset('/admin-assets/img/ImplementingPartner/IP2new.png')}}" >
                  </a>
                  </li>
                  <li class="nav-item">
                    <a target="_blank" href="https://www.gvmassam.org/">
                      <img src="{{asset('/admin-assets/img/ImplementingPartner/IP3new.png')}}" >
                  </a>
                  </li>
                  <li class="nav-item">
                    <a target="_blank" href="https://www.nerswn.org/">
                      <img src="{{asset('/admin-assets/img/ImplementingPartner/IP4new.png')}}" >
                  </a>
                  </li>
                  <li class="nav-item">
                    <a target="_blank" href="https://sesta.org/">
                      <img src="{{asset('/admin-assets/img/ImplementingPartner/IP5new.png')}}" >
                  </a>
                  </li>
                </ul>
                            </div>
                            <!-- /.col -->
                            
                           
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>

            <hr>
            <div style="height:20px; clear:both;"></div>
           
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>



<!-- /.content -->

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