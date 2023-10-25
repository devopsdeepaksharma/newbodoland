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
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Save Water</td>
                    <td>Assam</td>
                    <td>6 Months</td>
                    <td>This project purpose to save water...</td>
                    <!-- <td><i class="fa fa-edit">Create Project Detail</i></td> -->
                    <!-- <td><a href="{{ route('cso.createprojectdetail') }}"><button class="btn btn-warning btn-sm">Create Project Detail</button></a></td> -->
                    <td>
                    <a href="{{ route('cso.createprojectdetail') }}">
                    <div class="btn-group w-100">
                        <span class="btn btn-warning col fileinput-button dz-clickable">
                          <i class="fas fa-plus"></i>
                        <span>Create Project</span></span>
                      </div>
                    </a>
                        
                    </td>
                  </tr>
                  
                  
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