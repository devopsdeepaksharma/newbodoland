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
        <form name="projectstore" id="projectstore" action="post" action="{{route('storeprojectdetail')}}" enctype='multipart/form-data'>
            @csrf
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Create Project Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <label>Geography Information :-</label>
                    <div style="height:10px; clear:both;"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Select State : <span style="color:red;"> * </span></label>
                                    <select class="form-control" name="state" id="state">
                                    <option value="">Select State </option>
                                    <option value="assam">Assam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="block">Enter Block Name : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" name="block" id="block" placeholder="Block Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vcdc">Enter VCDC Name : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control"name="vcdc" id="vcdc" placeholder="Enter VCDC Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="villages">Enter Number Of Villages : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" name="villages" id="villages" placeholder="Enter Village Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="household">Enter Number of House Hold : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" name="household" id="household" placeholder="Enter House Hold Number">
                                </div>
                            </div>
                        </div>
                        <hr> 
                        <label>Budget Information :-</label>
                        <div style="height:10px; clear:both;"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">HR : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="INR">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="INR">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Program : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="INR">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <label>Source of Funding : <span style="color:red;"> * </span></label>
                        <div style="height:10px; clear:both;"></div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check checkbox-inline">
                                    <input class="form-check-input" name="brlf" id="brlf" type="checkbox">
                                    <label class="form-check-label checkbox-inline">BRLF</label>
                                </div>

                                <div class="form-check checkbox-inline">
                                    <input class="form-check-input" name="gvm" id="gvm" type="checkbox">
                                    <label class="form-check-label checkbox-inline">GVM</label>
                                </div>

                                <!-- <div class="form-check checkbox-inline">
                                    <input class="form-check-input" name="other" id="other" type="checkbox">
                                    <label class="form-check-label checkbox-inline">Others</label>
                                </div> -->
                                
                            </div>
                            </div>
                        </div>
                        <div class="card-footer" >
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="submit" class="btn btn-default">Cancel</button>
                        </div>
                </div>
            </div>
        </div>

        </form>
        
    <div>
</section>          



@endSection