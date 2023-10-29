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
      
      <div class="alert alert-warning">
        Please note the following points:
          <ul>
            <li>Project will be assigned when CSO Registration Status is <b>Completed</b> and Application Status is <b>Approved</b>.</li>
            <li>Application can be edited once Registration Status is <b>Completed</b> by clicking on <i class="fa fa-edit"></i> button.</li>
          </ul>
      </div>
      
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
          <div class="col-12"> <div class="card-header"></div>

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
                            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#assignModal{{$key}}" @if($user->registration_complete == 0 || $user->status == 'P') disabled @endif>Assign Project</button>
                            <a href="{{ route('users.show',$user->id) }}" >
                              <button class="btn btn-info btn-sm" @if($user->registration_complete == 0) disabled @endif><i class="fa fa-eye"></i></button>
                            </a>
                            <a href="{{ route('users.edit',$user->id) }}">
                              <button class="btn btn-primary btn-sm"@if($user->registration_complete == 0) disabled @endif ><i class="fa fa-edit"></i></button>
                            </a>
                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}" style="display: inline" onsubmit="return confirmDelete();" >
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                            </form>
                            </a>
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

    @foreach ($data as $key => $user)    
    <div class="modal fade" id="assignModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">{{ $user->name." ".$user->id }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
           <?php
             $userProjects = \App\Models\UserProject::where('user_id', $user->id)
                    ->join('projects','projects.id', 'user_project.project_id')
                    ->get('projects.*');
              ?>
                                <ol>
                                    @forelse($userProjects as $project) 
                                        <li>{{ $project->title }}</li>
                                    @empty    
                                      <span class="text-danger">No projects linked.</span>
                                    @endforelse
                                </ol>
                                    <form action="{{ route('assignProject') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="projectSelect">Link a new Project?</label>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            @php
                                              $projects = \App\Models\Project::where('status', 1)
                                                        ->whereNotIn('id', $user->projects->pluck('id'))
                                                        ->get();   
                                            @endphp
                                            <select name="project_id" class="form-control" id="projectSelect">
                                                <option value="">Select Project</option>
                                                @foreach($projects as $project)
                                                      <option value="{{ $project->id }}">{{ $project->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Link Project" class="btn btn-success btn-sm">
                                        </div>
                                    </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          </div>
        </div>
      </div>
    </div>
@endforeach

@endSection

@section('scripts')
<script>
  function confirmDelete()
  {
    return confirm("Are you sure you want to delete this user?");
  }
</script>
@endsection
