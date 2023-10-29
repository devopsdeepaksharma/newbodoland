@extends('adminlayouts.app')


@section('content')

<?php if($user->status == 'A') { ?>
<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-header">Assigned Project</div>
                    <div class="card-body">
                        <?php         
                            
                                if(count($projects) > 0) { ?>
                                <ol>
                                    @foreach($projects as $project) 
                                        <li>{{ $project->title }}</li>
                                    @endforeach
                                </ol>
                                <?php } else { ?>
                                    <span class="text-danger">No Projects linked.</span>
                                    <form action="{{ route('assignProject') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="projectSelect">Link a new Project?</label>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <select name="project_id" class="form-control" id="projectSelect">
                                                <option value="">Select Project</option>
                                                @foreach(\App\Models\Project::where('status', 1)->get() as $project)
                                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Link Project" class="btn btn-success btn-sm">
                                        </div>
                                    </form>
                                    
                                <?php } ?>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>   
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif







<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registered CSO Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
            <div class="card-body">
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Select an option</option>
                <option value="A" {{ $user->status == 'A' ? 'selected' : '' }}>Approved</option>
                <option value="P" {{ $user->status == 'P' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

@endsection