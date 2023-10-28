@extends('adminlayouts.app')


@section('content')
   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">CSO User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
            <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td> {{ $permission->name }}</td>
                    <td>  {{ $permission->detail }}</td>
                    
                  </tr>
                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

@endsection
