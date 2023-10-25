@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>
<?php if(Auth::user()->status == 'A') { ?>
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

<div class="card">

</div>

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


@endsection