@extends('adminlayouts.app')


@section('content')
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
            <div class="card-body p-0">
            <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td> {{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-right py-0 align-middle">
                    @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
                    </td>
                  </tr>
                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Application Status:</strong>
            @if($user->status == "A")
                <label class="badge badge-primary">Approved</label>
            @elseif($user->status == "R")
                <label class="badge badge-primary">Rejected</label>
            @else    
                <label class="badge badge-primary">Pending</label>
            @endif    


        </div>
    </div>
</div>

@php
    $admin = false;
    if(!empty($user->getRoleNames())) {
        foreach($user->getRoleNames() as $v) {
            if($v == 'Admin') {
                $admin = true;
            }
        }
    }
@endphp

@if($admin != true)
        <div class="content">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Basic Details :</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="headOfOrganisation">Head of Organisation <span style="color: red;">*</span> : </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('headOfOrganisation') is-invalid @enderror"  id="headOfOrganisation" name="headOfOrganisation" placeholder="Head of Organisation" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_head : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="headOfOrganisation">Organisation Name <span style="color: red;">*</span> : </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('organisationName') is-invalid @enderror" id="organisationName" name="organisationName" placeholder="Organisation Name" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_name : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="keyContactPerson">Key Contact Person <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('keyContactPerson') is-invalid @enderror" id="keyContactPerson" name="keyContactPerson" placeholder="key Contact Person" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_contact_person : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="mobile">Mobile <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Mobile" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_mobile : '' }}">
                                    @if ($errors->has('mobile'))
                                       <span class="text-danger errorsize">{{ $errors->first('mobile') }}</span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="landlineNumber">Landline Number :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="landlineNumber" name="landlineNumber" placeholder="Landline Number" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_landline : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="address">E-mail Address :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="email" name="email" placeholder="E-mail address" value="{{ $user->email }}" readonly>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="address">Address <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Address" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_address : '' }}"> 
                                 </div>
                              </div>
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="state">State <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="state" name="state" placeholder="State" value="{{ isset($partnerBasicDetails) ?  \App\Models\MyStates::find($partnerBasicDetails->org_state)->name : '' }}">
                                    {{--<input readonly type="text" class="form-control form-control-sm" id="state" name="state" placeholder="State" value="{{ isset($partnerBasicDetails) ?  \App\Models\State::find($partnerBasicDetails->org_state)->name : '' }}">--}}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="city">City <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="city" name="city" placeholder="City" value="{{ isset($partnerBasicDetails) ?  \App\Models\MyCities::find($partnerBasicDetails->org_district)->city : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="pincode">Pincode <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="pincode" name="pincode" placeholder="Pincode" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_pincode : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="website">Website :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="website" name="website" placeholder="Website" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_website : '' }}">
                                 </div>
                              </div>
                              
                              <div class="col-md-4"></div>
                           </div>
                        </div>
                     </div>
                     <!-- /.container-fluid -->
                  </div>
                  <!-- start second card body -->
                  <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Registration Details</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="modeOfRegistration">Mode of Registration <span style="color: red;">*</span> : </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('modeOfRegistration') is-invalid @enderror" id="modeOfRegistration" name="modeOfRegistration" placeholder="Mode of Registration" value="{{ isset($registrationDetail) ? $registrationDetail->modeofregistartion : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="dateOfRegistration">Date of Registration <span style="color: red;">*</span> : </label>
                                    <input readonly type="date" class="form-control form-control-sm" id="dateOfRegistration" name="dateOfRegistration" placeholder="Date of Registration" value="{{ isset($registrationDetail) ? $registrationDetail->dateofregistartion : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="registrationNumber">Registration No <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="registrationNumber" name="registrationNumber" placeholder="Registration No" value="{{ isset($registrationDetail) ? $registrationDetail->registartion_number : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="registrationCertificate">Download Registration Certificate <span style="color: red;">*</span> :  </label><br>
                                    <a href="{{ route('file.download', ['file' => isset($registrationDetail) ? $registrationDetail->registartion_certificate : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>
                                    </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="taRegistrationNo">12A Registration No <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="taRegistrationNo" name="taRegistrationNo" placeholder="12A Registration No" value="{{ isset($registrationDetail) ? $registrationDetail->TA_registration_number : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="taCertificate">Download 12A Certificate <span style="color: red;">*</span> :  </label><br>
                                    <a href="{{ route('file.downloadTACetificate', ['file' => isset($registrationDetail) ? $registrationDetail->TA_certificate : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>                                 
                                </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="pan">Pan Number <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('pan') is-invalid @enderror" id="pan" name="pan" placeholder="PAN Number" value="{{ isset($registrationDetail) ? $registrationDetail->pan : '' }}" readonly>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="darpan">Registered in NGO Darpan <span style="color: red;">*</span> :  </label>
                                    <!-- <input readonly type="text" class="form-control form-control-sm @error('darpan') is-invalid @enderror" id="darpan" name="darpan" placeholder="Registered in NGO Darpan" value="{{ old('darpan') }}"> -->
                                    <select class="form-control form-control-sm" name="darpan" id="darpan">
                                        <option value="">Select Option</option>
                                        <option value="yes" {{ isset($registrationDetail) && $registrationDetail->in_darpan == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ isset($registrationDetail) && $registrationDetail->in_darpan == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="tanNumber">Tan No <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('tanNumber') is-invalid @enderror" id="tanNumber" name="tanNumber" placeholder="Tan No" value="{{ isset($registrationDetail) ? $registrationDetail->tan_number : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="egNumber">80 G Number <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="egNumber" name="egNumber" placeholder="80 G Number" value="{{ isset($registrationDetail) ? $registrationDetail->EG_number : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="fcraNumber">FCRA Registration Number <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm @error('fcraNumber') is-invalid @enderror" id="fcraNumber" name="fcraNumber" placeholder="FCRA Registration Number" value="{{ isset($registrationDetail) ? $registrationDetail->fcra_number : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="fcra_certificate_exists">Do you have FCRA <span style="color: red;">*</span> : </label>
                                    <select class="form-control form-control-sm" name="fcra_certificate_exists" id="fcra_certificate_exists" readonly >
                                       <option value="">Select Option</option>
                                       <option value="yes" {{ isset($registrationDetail) && $registrationDetail->in_fcra == 'yes' ? 'selected' : ''   }}>Yes</option>
                                       <option value="no" {{ isset($registrationDetail) && $registrationDetail->in_fcra == 'no' ? 'selected' : ''}}>No</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="fcraRenewalDate">FCRA Renewal Date <span style="color: red;">*</span> :  </label>
                                    <input readonly type="date" class="form-control form-control-sm @error('fcraRenewalDate') is-invalid @enderror" id="fcraRenewalDate" name="fcraRenewalDate" placeholder="FCRA Renewal Date" value="{{ isset($registrationDetail) ? $registrationDetail->fcra_renewal_date : '' }}">
                                 </div>
                              </div>
                              @if(isset($registrationDetail) && $registrationDetail->fcra_certificate != '')
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="fcraCertificatefile">Download FCRA Certificate <span style="color: red;">*</span> :  </label><br>
                                    <a href="{{ route('file.downloadFCRACetificate', ['file' => isset($registrationDetail) ? $registrationDetail->fcra_certificate : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a> 
                                    
                                 </div>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                     <!-- /.container-fluid -->
                  </div>
                  <!-- end second card body -->

                 <!-- start third card body -->
                   <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Organisation Profile</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                   <label for="pincode">Focus of the org on tribal Livelihood :  </label>
                                     <div class="form-group">
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="livelihood" value="yes" {{ isset($organisationProfile) && $organisationProfile->tribal_livelihood == 'yes' ? 'checked' : '' }} >Yes
                                       </label>
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="livelihood" value="no" {{ isset($organisationProfile) && $organisationProfile->tribal_livelihood == 'no' ? 'checked' : '' }}>No
                                       </label>
                                     </div>
                              </div>
                              <div class="col-md-6">
                                   <label for="pincode">Focus of the org on PRI:  </label>
                                     <div class="form-group">
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="pri" id="pri" value="yes" {{ isset($organisationProfile) && $organisationProfile->pri == 'yes' ? 'checked' : '' }}>Yes
                                       </label>
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="pri" id="pri" value="no" {{ isset($organisationProfile) && $organisationProfile->pri == 'no' ? 'checked' : '' }}>No
                                       </label>
                                     </div>
                              </div>
                              <div class="col-md-6">
                               
                                   <label for="pincode">Leveraging resources from govt flagship program :  </label>
                                     <div class="form-group">
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="flagship" id="flagship" value="yes" {{ isset($organisationProfile) && $organisationProfile->flagship == 'yes' ? 'checked' : '' }}>Yes
                                       </label>
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="flagship" id="flagship" value="no" {{ isset($organisationProfile) && $organisationProfile->flagship == 'no' ? 'checked' : '' }}>No
                                       </label>
                                     </div>
                              </div>
                              <div class="col-md-6">
                                   <label for="pincode">Focus of the org on women:  </label>
                                     <div class="form-group">
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="women" id="women" value="yes" {{ isset($organisationProfile) && $organisationProfile->focus_on_women == 'yes' ? 'checked' : '' }}>Yes
                                       </label>
                                       <label class="radio-inline">
                                         <input readonly type="radio" name="women" id="women" value="no" {{ isset($organisationProfile) && $organisationProfile->focus_on_women == 'no' ? 'checked' : '' }}>No
                                       </label>
                                     </div>
                              </div>

                              <div class="col-md-12">
                                 
                              </div>
                              
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- end third card body -->

                   <!-- start forth card body -->
                   <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Name of Major Donor</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                             <div class="col-md-4">
                                   <div class="form-group">
                                     <label for="donor1">Donor 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('donor1') is-invalid @enderror"  id="donor1" name="donor1" placeholder="Donor 1" value="{{ isset($majorDonor) ? $majorDonor->donor1 : '' }}">
                                    </div>  
                             </div>
                             <div class="col-md-4">
                                   <div class="form-group">
                                     <label for="donor1">Donor 2 :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="donor2" name="donor2" placeholder="Donor 2" value="{{  isset($majorDonor) ? $majorDonor->donor2 : ''  }}">
                                   </div>
                             </div>
                             <div class="col-md-4">
                                   <div class="form-group">
                                     <label for="donor1">Donor 3 :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="donor3" name="donor3" placeholder="Donor 3" value="{{  isset($majorDonor) ? $majorDonor->donor3 : ''  }}">
                                   </div>
                             </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- end Forth card body -->

               <!-- start fifth card body -->
                   <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Budget Information</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budgetYear1">FY {{$fY}} <span style="color: red;">*</span>  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear1" name="budgetYear1" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year1 : '' }}" placeholder="Budget Year 1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                     <label for="budget1">Budget for FY {{$fY}} <span style="color: red;">*</span>   </label>
                                     <input readonly type="text" class="form-control form-control-sm " id="budget1" name="budget1" placeholder="Budget 1" value="{{ isset($budgetInformation) ? $budgetInformation->budget1 : '' }}">
                                </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budgetYear2">FY {{$fY1}} </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear2" name="budgetYear2" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year2 : ''  }}" placeholder="Budget Year 2">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budget2">Budget for FY {{$fY1}}  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budget2" name="budget2" placeholder="Budget 2" value="{{ isset($budgetInformation) ? $budgetInformation->budget2 : '' }}">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budgetYear3">FY {{$fY2}}  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear3" name="budgetYear3" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year3 : '' }}" placeholder="Budget Year 3">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budget3">Budget for FY {{$fY2}}   </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budget3" name="budget3" placeholder="Budget 3" value="{{ isset($budgetInformation) ? $budgetInformation->budget3 : '' }}">
                                   </div>
                             </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- end fifth card body -->

                  <!-- start sixth card body -->
                  <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Audit Report</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="auditReportYear1">FY {{$fY}}<span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear1') is-invalid @enderror" id="auditReportYear1" name="auditReportYear1" value="{{ isset($auditReport) ? $auditReport->audit_year1 : '' }}" placeholder="Donor 1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport">Download Report for FY {{$fY}} <span style="color: red;">*</span> :  </label><br>
                                     <a href="{{ route('file.downloadAuditReport1', ['file' => isset($auditReport) ? $auditReport->audit_report1 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a> 
                                     
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="auditReportYear2">FY {{$fY1}} <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear2') is-invalid @enderror" id="auditReportYear2" name="auditReportYear2" value="{{ isset($auditReport) ? $auditReport->audit_year2 : '' }}" placeholder="Donor 2">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport2">Download Report for FY {{$fY1}} <span style="color: red;">*</span> :  </label><br>
                                     <a href="{{ route('file.downloadAuditReport2', ['file' => isset($auditReport) ? $auditReport->audit_report2 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a> 
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="auditReportYear3">FY {{$fY2}} <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear3') is-invalid @enderror" id="auditReportYear3" name="auditReportYear3" value="{{ isset($auditReport) ? $auditReport->audit_year3 : '' }}" placeholder="Donor 3">
                                     @if($errors->has('auditReportYear3'))
                                          <span class="text-danger errorsize">{{ $errors->first('auditReportYear3') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport3">Download Report for FY {{$fY2}} <span style="color: red;">*</span> :  </label><br>
                                     <a href="{{ route('file.downloadAuditReport3', ['file' => isset($auditReport) ? $auditReport->audit_report3 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>
                                    </div>
                             </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- end sixth card body -->

                  <!-- start Annual Report seventh card body -->
                  <div class="col-md-12">
                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Annual Report</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="annualReportYear1">FY {{$fY}} <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear1') is-invalid @enderror" id="annualReportYear1" name="annualReportYear1" value="{{ isset($annualReport) ? $annualReport->annual_year1 : '' }}" placeholder="Annual Report Year1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport1">Download Annual Report for FY {{$fY}} <span style="color: red;">*</span> :  </label><br>
                                     <a href="{{ route('file.downloadAnnualReport1', ['file' => isset($annualReport) ? $annualReport->annual_report1 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="annualReportYear2">FY {{$fY1}} <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear2') is-invalid @enderror" id="annualReportYear2" name="annualReportYear2" value="{{ isset($annualReport) ? $annualReport->annual_year2 : '' }}" placeholder="Annual Report Year2">
                                     @if($errors->has('annualReportYear2'))
                                          <span class="text-danger errorsize">{{ $errors->first('annualReportYear2') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport2">Download Annual Report for FY {{$fY1}}<span style="color: red;">*</span> :  </label><br> 
                                     <a href="{{ route('file.downloadAnnualReport2', ['file' => isset($annualReport) ? $annualReport->annual_report2 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="annualReportYear3">FY {{$fY}} <span style="color: red;">*</span> :  </label> 
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear3') is-invalid @enderror" id="annualReportYear3" name="annualReportYear3" value="{{ isset($annualReport) ? $annualReport->annual_year3 : '' }}" placeholder="Annual Report Year3">
                                     @if($errors->has('annualReportYear3'))
                                          <span class="text-danger errorsize">{{ $errors->first('annualReportYear3') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport3">Download Annual Report for FY {{$fY2}} <span style="color: red;">*</span> :  </label><br>  
                                     <a href="{{ route('file.downloadAnnualReport3', ['file' => isset($annualReport) ? $annualReport->annual_report3 : '']) }}">
                                    <i class="fa fa-download"></i>
                                    </a>
                                    </div>
                             </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- end seventh card body -->
                  @if($user->status != "A" && $user->status != "R")
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="{{ route('users.changeStatus') }}" method="post">
                            @csrf
                            <input type="hidden" name="userId" value="{{ $user->id }}">
                            <select name="approval_status" id="approval_status" class="form-control" required>
                                <option value="">Choose an option</option>
                                <option value="A">Approve</option>
                                <option value="R">Reject</option>
                            </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </div>
                </form>
                @endif
                <div style="height:100px; clear:both;"></div>
               </div>
            </div>
         </div>
    </div>
    @endif
        
@endsection