@extends('adminlayouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="card card-primary">

</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ Auth::user()->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ Auth::user()->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
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
                           <h3 class="card-title">Basic Details</h3>
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
                                    <input readonly type="text" class="form-control form-control-sm" id="state" name="state" placeholder="State" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_state : '' }}">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="city">City <span style="color: red;">*</span> :  </label>
                                    <input readonly type="text" class="form-control form-control-sm" id="city" name="city" placeholder="City" value="{{ isset($partnerBasicDetails) ?  $partnerBasicDetails->org_district : '' }}">
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
                                    <label for="registrationCertificate">Upload Registration Certificate <span style="color: red;">*</span> :  </label>
                                    <a href="">
                                        <button class="btn btn-success btn-sm">Download</button>
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
                                    <label for="taCertificate">Upload 12A Certificate <span style="color: red;">*</span> :  </label>
                                    <a href="">
                                        <button class="btn btn-success btn-sm">Download</button>
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
                                    <select class="form-control form-control-sm" name="fcra_certificate_exists" id="fcra_certificate_exists" >
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
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="fcraCertificatefile">Upload FCRA Certificate <span style="color: red;">*</span> :  </label>
                                    <input readonly type="file" class="form-control form-control-sm" id="fcraCertificatefile" name="fcraCertificatefile">
                                 </div>
                              </div>
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
                                     <label for="budgetYear1">Budget Year 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear1" name="budgetYear1" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year1 : '' }}" placeholder="Budget Year 1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                     <label for="budget1">Budget 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm " id="budget1" name="budget1" placeholder="Budget 1" value="{{ isset($budgetInformation) ? $budgetInformation->budget1 : '' }}">
                                </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budgetYear2">Budget Year 2 :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear2" name="budgetYear2" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year2 : ''  }}" placeholder="Budget Year 2">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budget2">Budget 2 :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budget2" name="budget2" placeholder="Budget 2" value="{{ isset($budgetInformation) ? $budgetInformation->budget2 : '' }}">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budgetYear3">Budget Year 3 :  </label>
                                     <input readonly type="text" class="form-control form-control-sm" id="budgetYear3" name="budgetYear3" value="{{ isset($budgetInformation) ? $budgetInformation->budget_year3 : '' }}" placeholder="Budget Year 3">
                                   </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="budget3">Budget 3 :  </label>
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
                                     <label for="auditReportYear1">Year 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear1') is-invalid @enderror" id="auditReportYear1" name="auditReportYear1" value="{{ isset($auditReport) ? $auditReport->audit_year1 : '' }}" placeholder="Donor 1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport">Upload Report 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm @error('uploadAuditReport1') is-invalid @enderror" id="uploadAuditReport1" name="uploadAuditReport1" placeholder="Donor 2">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="auditReportYear2">Year 2 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear2') is-invalid @enderror" id="auditReportYear2" name="auditReportYear2" value="{{ isset($auditReport) ? $auditReport->audit_year2 : '' }}" placeholder="Donor 2">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport2">Upload Report 2 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm @error('uploadAuditReport2') is-invalid @enderror" id="uploadAuditReport2" name="uploadAuditReport2" placeholder="Donor 2">
                                     @if ($errors->has('uploadAuditReport2'))
                                          <span class="text-danger errorsize">{{ $errors->first('uploadAuditReport2') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="auditReportYear3">Year 3 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('auditReportYear3') is-invalid @enderror" id="auditReportYear3" name="auditReportYear3" value="{{ isset($auditReport) ? $auditReport->audit_year3 : '' }}" placeholder="Donor 3">
                                     @if($errors->has('auditReportYear3'))
                                          <span class="text-danger errorsize">{{ $errors->first('auditReportYear3') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAuditReport3">Upload Report 3 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm @error('uploadAuditReport3') is-invalid @enderror" id="uploadAuditReport3" name="uploadAuditReport3" placeholder="Donor 2">
                                     @if ($errors->has('uploadAuditReport3'))
                                          <span class="text-danger errorsize">{{ $errors->first('uploadAuditReport3') }}</span>
                                       @endif
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
                                     <label for="annualReportYear1">Year 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear1') is-invalid @enderror" id="annualReportYear1" name="annualReportYear1" value="{{ isset($annualReport) ? $annualReport->annual_year1 : '' }}" placeholder="Annual Report Year1">
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport1">Upload Annual Report 1 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm @error('uploadAnnualReport1') is-invalid @enderror" id="uploadAnnualReport1" name="uploadAnnualReport1" placeholder="Upload Annual Report 1">
                                     @if ($errors->has('uploadAnnualReport1'))
                                          <span class="text-danger errorsize">{{ $errors->first('uploadAnnualReport1') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="annualReportYear2">Year 2 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear2') is-invalid @enderror" id="annualReportYear2" name="annualReportYear2" value="{{ isset($annualReport) ? $annualReport->annual_year2 : '' }}" placeholder="Annual Report Year2">
                                     @if($errors->has('annualReportYear2'))
                                          <span class="text-danger errorsize">{{ $errors->first('annualReportYear2') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport2">Upload Annual Report 2 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm @error('uploadAnnualReport2') is-invalid @enderror" id="uploadAnnualReport2" name="uploadAnnualReport2" placeholder="Upload Annual Report 2">
                                     @if ($errors->has('uploadAnnualReport2'))
                                          <span class="text-danger errorsize">{{ $errors->first('uploadAnnualReport2') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="annualReportYear3">Year 3 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="text" class="form-control form-control-sm @error('annualReportYear3') is-invalid @enderror" id="annualReportYear3" name="annualReportYear3" value="{{ isset($annualReport) ? $annualReport->annual_year3 : '' }}" placeholder="Annual Report Year3">
                                     @if($errors->has('annualReportYear3'))
                                          <span class="text-danger errorsize">{{ $errors->first('annualReportYear3') }}</span>
                                       @endif
                                    </div>
                             </div>
                             <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="uploadAnnualReport3">Upload Annual Report 3 <span style="color: red;">*</span> :  </label>
                                     <input readonly type="file" class="form-control form-control-sm" id="uploadAnnualReport3" name="uploadAnnualReport3" placeholder="Upload Annual Report 3">
                                     @if ($errors->has('uploadAnnualReport3'))
                                          <span class="text-danger errorsize">{{ $errors->first('uploadAnnualReport3') }}</span>
                                       @endif
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
               </div>
            </div>
         </div>
    </div>
    @endif

@endsection