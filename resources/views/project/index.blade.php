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
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <a href="{{ route('project.create') }}">
                                <button class="btn-primary btn">Add Project</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td style="width:30%">{{ $item->description }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else    
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class=" justify-content-center">
                                            <a href="{{ route('project.edit', ['id'=>$item->id]) }}">
                                                <button class="btn btn-success mx-1"><i class="nav-icon fas fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('project.delete', ['id'=>$item->id]) }}">
                                                <button class="btn btn-danger mx-1" onclick="return confirmDelete()"><i class="nav-icon fas fa-trash"></i> Delete</button>
                                            </a>
                                        </td>                                
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-danger">No Data found</td>
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
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
@section('scripts')
<script>
  function confirmDelete()
  {
    return confirm("Are you sure you want to delete this user?");
  }
</script>
@endsection