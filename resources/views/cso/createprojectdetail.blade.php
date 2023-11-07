@extends('adminlayouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
            <input type="hidden" name="project_id" value="{{$pro_id}}" >
            <div class="col-12">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Fill Project Detail</h3>
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
                                    
                                    </select>
                                    @if ($errors->has('state'))
                                          <span class="text-danger errorsize">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="district">Select District : <span style="color:red;"> * </span></label>
                                    <select class="form-control @error('district') is-invalid @enderror" name="district" id="district" onchange="return getBlocks(this)">
                                        <option value="">Select District </option>
                                    </select>
                                    @if ($errors->has('district'))
                                          <span class="text-danger errorsize">{{ $errors->first('district') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="block">Enter Block Name : <span style="color:red;"> * </span></label>
                                    <select class="form-control @error('block') is-invalid @enderror" name="block" id="block" onchange="return getVcdcs(this)">
                                        <option value="">Select Block</option>
                                    </select>
                                    @if ($errors->has('block'))
                                          <span class="text-danger errorsize">{{ $errors->first('block') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vcdc">Enter VCDC Name : <span style="color:red;"> * </span></label>
                                    <select class="form-control @error('vcdc') is-invalid @enderror" name="vcdc" id="vcdc" >
                                        <option value="">Select VCDC</option>
                                    </select>
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

@section('scripts')
    {{-- script for Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {

            // for select 2 dropdowns
            $('#state').select2();
            $('#district').select2();
            $('#block').select2();
            $('#vcdc').select2();
            //load all districts on page load
            getAllDistricts();
            getAllStates();

            function getAllDistricts()
            {
                $.ajax({
                url: '/api/getAllDistricts',  // Replace with the actual route in your backend
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Once data is received, populate the dropdown
                    var dropdown = $('#district');
                    dropdown.empty(); // Clear existing options
                    // Add a default option
                    dropdown.append('<option value="">Select District</option>');
                    // Add the districts from the AJAX response
                    $.each(data, function(key, value) {
                        dropdown.append('<option value="' + value.id + '">' + value.district_name + '</option>');
                    });
                },
                error: function() {
                    alert("Error while fetching districts");
                }
            });
            }

            function getAllStates()
            {
                $.ajax({
                url: '/api/getAllStates',  // Replace with the actual route in your backend
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Once data is received, populate the dropdown
                    var dropdown = $('#state');
                    dropdown.empty(); // Clear existing options
                    // Add a default option
                    dropdown.append('<option value="">Select State</option>');
                    // Add the districts from the AJAX response
                    $.each(data, function(key, value) {
                        dropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function() {
                    alert("Error while fetching states");
                }
            });
            }
        });


        function getBlocks(param)
        {
            var districtId = param.value;
            if (districtId) {
                // Make an AJAX request to fetch blocks for the selected district
                $.ajax({
                    url: '/api/getBlocks/' + districtId, // Replace with the actual route in your backend
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var blocksDropdown = $('#block');
                        blocksDropdown.empty(); // Clear existing options

                        // Add a default option
                        blocksDropdown.append('<option value="">Select Block</option>');

                        // Add the blocks from the AJAX response
                        $.each(data, function(key, value) {
                            blocksDropdown.append('<option value="' + value.id + '">' + value.block_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching blocks.');
                    }
                });
            } else {
                // If no district is selected, clear the blocks dropdown
                $('#block').empty();
            }

        }

        function getVcdcs(param)
        {
            let blockId = param.value;
            if (blockId) {
            $.ajax({
                    url: '/api/getVcdcs/' + blockId, 
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var vcdcDropdown = $('#vcdc');
                        vcdcDropdown.empty();
                        vcdcDropdown.append('<option value="">Select VCDC</option>');
                        $.each(data, function(key, value) {
                            vcdcDropdown.append('<option value="' + value.id + '">' + value.vcdc_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching VCDC.');
                    }
                });
            } else {
                $('#vcdc').empty();
            }
        }
    </script>
    
    
<!-- Below code for validation -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the input element
        var hrInput = document.getElementById('hr');
        var adminBudgetInput = document.getElementById('adminBudget');
        var programInput = document.getElementById('program');

        // Attach an input event listener to the input element
        hrInput.addEventListener('input', function () {
            var inputValue = hrInput.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(inputValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                hrInput.value = ''; // Clear the input field
            }
        });
        // Attach an input event listener to the input element
        adminBudgetInput.addEventListener('input', function () {
            var inputValue = adminBudgetInput.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(inputValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                adminBudgetInput.value = ''; // Clear the input field
            }
        });
        // Attach an input event listener to the input element
        programInput.addEventListener('input', function () {
            var inputValue = programInput.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(inputValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                programInput.value = ''; // Clear the input field
            }
        });
    });
</script>

@endsection