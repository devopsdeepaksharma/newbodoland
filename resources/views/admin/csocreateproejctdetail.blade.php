@extends('adminlayouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Projects</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card ">
              <div class="card-header bg-danger">
                <h3 class="card-title">CSO Craete Project Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Project Title</th>
                    <th>CSO Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach($csoProjectDetails as $cpd)
                    <tr>
                    <td>{{$i}}</td>
                    <td>{{$cpd->title}}</td>
                    <td>{{$cpd->name}}</td>
                    <td>{{$cpd->email}}</td>
                    <td>{{$cpd->mobile}}</td>
                    @if($cpd->cpd_status == 0)
                    <td style="color:red;">Pending</td>
                    @else
                    <td style="color:green;">Approved</td>
                    @endif
                    
                    <td><a href="{{ route('cso.viewprojectlist', ['p_id' => $cpd->project_id, 'u_id' => $cpd->user_id]) }}"><i class="fa fa-eye" title="View Project Details"></i></a></td>

                  </tr>
                  @php $i++; @endphp
                    @endforeach
                  
                 
                  
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection