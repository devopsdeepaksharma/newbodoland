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
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cso.createprojectlist') }}"> Back</a>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header bg-danger">
                        <h3 class="card-title">CSO Craete Project Details</h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Project Summary</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Project title:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->title}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">CSO Name:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->name}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">CSO Email address:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->email}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">CSO Contact Number:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->mobile}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">PAN:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->pan}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Geography Summary</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @php
                                            $stateId = $csoCreateProjectDetails->state_id;
                                            $stateId = $csoCreateProjectDetails->state_id;
                                            $blockId = $csoCreateProjectDetails->block_id;
                                            $vcdcId = $csoCreateProjectDetails->vcdc_id;
                                            $stateName = \App\Models\State::where('id', $stateId)->value('name');

                                            $districtName = \App\Models\District::where('state_id',
                                            $stateId)->value('district_name');
                                            $blockName = \App\Models\Block::where('id', $blockId)->value('block_name');
                                            $vcdcName =
                                            \App\Models\VillageCouncilDevelopmentCommittee::where('block_Id',
                                            $blockId)->value('vcdc_name');
                                            @endphp

                                            <div class="form-group">
                                                <label for="email">State:</label>
                                                <input type="text" value="{{$stateName}}" class="form-control"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">District:</label>
                                                <input type="text" value="{{$districtName}}" class="form-control"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Block:</label>
                                                <input type="text" value="{{$blockName}}" class="form-control"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Total VCDC:</label>
                                                <input type="text" value="{{$vcdcName}}" class="form-control"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Total Villages:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->village_count}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Total HouseHold:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->household_count}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Budget Summary</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">HR Budget:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->hr_budget}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Admin Budget:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->admin_budget}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Program Budget:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->program_name}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Source of Funding:</label>
                                                <input type="text" value="{{$csoCreateProjectDetails->fund_source}}"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        @php
                                        $total =
                                        $csoCreateProjectDetails->hr_budget+$csoCreateProjectDetails->admin_budget+$csoCreateProjectDetails->program_name;
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Total Budget:</label>
                                                <input type="text" value="{{$total}}" class="form-control" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cso.updateprojectlist') }}" method="get">
                            <input type="hidden" name="user_id" value="{{$csoCreateProjectDetails->user_id}}">
                            <input type="hidden" name="project_id" value="{{$csoCreateProjectDetails->project_id}}">
                            <input type="hidden" name="cpd_id" value="{{$csoCreateProjectDetails->cpd_id}}">
                            @if($csoCreateProjectDetails->status != 1)
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="A">Approved</option>
                                            <option value="P">Reject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>


                                </div>
                            </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection