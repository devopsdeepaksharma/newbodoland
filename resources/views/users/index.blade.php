@extends('layouts.app')


@section('content')

<div class="">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Users Management</h1>
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
        <div class="col-md-6 d-flex justify-content-end">
          <form action="{{ route('users.index') }}" method="get">
            <div class="form-group">
              <select name="status" id="status" class="form-control">
                <option value="">Choose an option</option>
                <option value="A" {{ request()->query('status') == 'A' ? 'selected' : '' }} >Approved</option>
                <option value="P" {{ request()->query('status') == 'P' ? 'selected' : '' }} >Pending</option>
              </select>
            </label>
          </div>
          
          
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="submit" value="Filter" class="btn btn-primary">
          </div> 
        </div>
      </form>
      </div>
    </div>
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <div class="card card-light">
                  <div class="card-header">
                      <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Status</th>
                          <th width="280px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                            @endforeach
                            @endif
                          </td>
                          <td>
                            @if($user->status == 'P')
                              <label class="badge bg-warning">Pending</label>
                            @else  
                              <label class="badge bg-warning">Approved</label>
                            @endif
                          </td>
                          <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
                     {{-- {!! $data->render() !!} --}}
                     {{$data->links("pagination::bootstrap-5")}}
                  </div>
                </div>
              </div>
          </div>
      </div>
    </section>
  </div>
@endsection