@extends('adminlayouts.app')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registered CSO List</h1>
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
    <div class="container"> 
      <form action="{{ route('users.index') }}" method="get">
      <div class="row">
        <div class="col-md-4"> 
        <label for="sel1" class="form-label">Filter CSO List for Approved/Pending here :</label>
          </div>
        <div class="col-md-4">
           
            <div class="form-group">
           
              <select name="status" id="status" class="form-control">
                <option value="">Choose an option</option>
                <option value="A" {{ request()->query('status') == 'A' ? 'selected' : '' }} >Approved</option>
                <option value="P" {{ request()->query('status') == 'P' ? 'selected' : '' }} >Pending</option>
              </select>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="submit" value="Filter" class="btn btn-primary">
          </div> 
        </div>
      </div>
    </form>
    </div>
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
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Registration Status</th>
                          <th>Application Status</th>
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
                            @if($user->registration_complete == 0)
                              <label class="badge bg-primary">Draft</label>
                            @elseif($user->registration_complete == 1)
                              <label class="badge bg-primary">Completed</label>
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
                            <a href="{{ route('users.show',$user->id) }}" >
                              <button class="btn btn-info btn-sm" @if($user->registration_complete == 0) disabled @endif>Show</button>
                            </a>
                            <a href="{{ route('users.edit',$user->id) }}">
                              <button class="btn btn-primary btn-sm"@if($user->registration_complete == 0) disabled @endif >Edit</button>
                            </a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
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