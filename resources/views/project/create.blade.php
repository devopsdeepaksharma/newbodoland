@extends('adminlayouts.app')

@section('content')

<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


@if(\session()->has('message')) 
    <div class="alert alert-danger">{{ \session('message') }}</div>
@endif



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-light">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('project.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="title">Project Title</label>
                                            <input type="text" name="title" id="title" class="form-control" value="{{ old('name') }}" placeholder="Write project title" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="description">Project Description</label>
                                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" placeholder="Write project description" required>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="status">Project Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Select an Option</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <input type="submit" value="Save" class="btn btn-success">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection