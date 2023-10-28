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
        <form  method="POST" action="{{ route('cso.storeprojectdetail') }}" enctype='multipart/form-data'>
            @csrf  
        <div class="row">
            <input type="text" name="project_id" value="{{$pro_id}}" >
            <input type="text" name="user_id" value="{{$user_id}}" >
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
                                    <label for="state">Select State : <span style="color:red;"> * </span></label>
                                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state" >
                                    <option value="">Select State </option>
                                    <option value="assam">Assam</option>
                                    </select>
                                    @if ($errors->has('state'))
                                          <span class="text-danger errorsize">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="block">Enter Block Name : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control @error('block') is-invalid @enderror" name="block" id="block" value="{{ old('block') }}"  placeholder="Block Name">
                                    @if ($errors->has('block'))
                                          <span class="text-danger errorsize">{{ $errors->first('block') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vcdc">Enter VCDC Name : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control @error('vcdc') is-invalid @enderror"name="vcdc" id="vcdc" value="{{ old('vcdc') }}" placeholder="Enter VCDC Name">
                                    @if ($errors->has('vcdc'))
                                          <span class="text-danger errorsize">{{ $errors->first('vcdc') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="village">Enter Number Of Villages : <span style="color:red;"> * </span></label>
                                    <input type="number" class="form-control @error('village') is-invalid @enderror" name="village" id="village" value="{{ old('village') }}" placeholder="Enter Village Name">
                                    @if ($errors->has('village'))
                                          <span class="text-danger errorsize">{{ $errors->first('village') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="household">Enter Number of House Hold : <span style="color:red;"> * </span></label>
                                    <input type="number" class="form-control @error('household') is-invalid @enderror" name="household" id="household" value="{{ old('household') }}" placeholder="Enter House Hold Number">
                                    @if ($errors->has('household'))
                                          <span class="text-danger errorsize">{{ $errors->first('household') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr> 
                        <label>Budget Information :-</label>
                        <div style="height:10px; clear:both;"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="hr">HR : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control @error('hr') is-invalid @enderror" id="hr" name="hr" value="{{ old('hr') }}" placeholder="₹ 0.00">
                                    @if ($errors->has('hr'))
                                          <span class="text-danger errorsize">{{ $errors->first('hr') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="adminBudget">Admin : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control @error('adminBudget') is-invalid @enderror" id="adminBudget" name="adminBudget" value="{{ old('adminBudget') }}" placeholder="₹ 0.00">
                                    @if ($errors->has('adminBudget'))
                                          <span class="text-danger errorsize">{{ $errors->first('adminBudget') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="program">Programe : <span style="color:red;"> * </span></label>
                                    <input type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" value="{{ old('program') }}" placeholder="₹ 0.00">
                                    @if ($errors->has('program'))
                                          <span class="text-danger errorsize">{{ $errors->first('program') }}</span>
                                    @endif
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
                                   
                                    <input class="form-check-input @error('source') is-invalid @enderror" name="source[]" id="brlf" value="BRLF"  type="checkbox"> 
                                    @if ($errors->has('source'))
                                          <span class="text-danger errorsize">{{ $errors->first('source') }}</span>
                                    @endif
                                    <label class="form-check-label checkbox-inline">BRLF</label>
                                    
                                </div>

                                <div class="form-check checkbox-inline">
                                   
                                    <input class="form-check-input @error('source') is-invalid @enderror" name="source[]" id="gvm" value="GVM"  type="checkbox">
                                    @if ($errors->has('source'))
                                          <span class="text-danger errorsize">{{ $errors->first('gvm') }}</span>
                                    @endif 
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