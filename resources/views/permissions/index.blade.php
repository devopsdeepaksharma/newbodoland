@extends('adminlayouts.app')


@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
        <div class="pull-right">
                @can('permission-create')
                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
                @endcan
            </div>
      </div><!-- /.container-fluid -->
    </section>


 

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> <div class="card-header">
                      {{-- <a class="btn btn-success" style="float:right;" href="{{ route('users.create') }}"> Create New User</a> --}}
                  </div>

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Registered CSO List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
              <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($permissions as $permission)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $permission->name }}</td>
	        <td>{{ $permission->detail }}</td>
	        <td>
                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                    @can('permission-edit')
                    <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('permission-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
                {!! $permissions->links("pagination::bootstrap-4") !!}

               
              </div>
             
            </div>
           
          </div>
         
        </div>
       
      </div>
     
    </section>

@endsection