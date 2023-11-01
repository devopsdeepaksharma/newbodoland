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
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Assigned Project</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Project Title</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th >Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($csoProjectDetails as $data)
     
                  <tr>
                    <td>1</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->location}}</td>
                    <td>{{$data->duration}} Years</td>
                    <td style="width:50%">{{$data->description}}</td>
                    <td>
                     @if($data->cso_create_project_status == 1)
                        <div class="btn-group w-100">
                        <span class="btn btn-info">
                        <span>Pending for SMPU Approval</span>
                      </span>
                      </div>
                      @else
                      <a href="{{ route('cso.createprojectdetail', ['pro_id' => $data->project_id, 'user_id' => $data->user_id])}}">
                        <div class="btn-group w-100">
                        <span class="btn btn-warning col fileinput-button dz-clickable">
                        <span>Create Project</span></span>
                      </div>
                      </a>
                      @endif 
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endSection