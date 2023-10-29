<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>BRLF | Partners Profile Details</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
      <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
     
      <style>
         .errorsize{
            font-size:12px;
         }
         
      </style>
   </head>
   <body class="hold-transition layout-top-nav">
      <!-- below -->
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
               <a href="#" class="navbar-brand">
               <img src="{{asset('admin-assets/img/logo/logo1.png')}}" alt="AdminLTE Logo"  style="width:40%; height:auto;">
               </a>
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt nav-icon"></i> Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </li>
               </ol>
            </div>
         </nav>
         <!-- /.navbar -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h5 class="m-0"> <i class="fa fa-user"></i> Partners Profile Details</h5>
                     </div>
                     <!-- /.col -->
                     
                  </div>
                  <span style="color:red; font-size:14px;"> Below fields are required with astrick ( * ) sign</span>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
               <div class="container">
                <form method="post" action="{{route('getcsoregistration')}}" id="csoform-validation" name="csoform-validation" enctype='multipart/form-data'>
                  @csrf
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
                                       <input type="text" class="form-control form-control-sm @error('headOfOrganisation') is-invalid @enderror"  id="headOfOrganisation" name="headOfOrganisation" placeholder="Head of Organisation" value="{{ old('headOfOrganisation') }}">
                                       @if ($errors->has('headOfOrganisation'))
                                          <span class="text-danger errorsize">{{ $errors->first('headOfOrganisation') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="headOfOrganisation">Organisation Name <span style="color: red;">*</span> : </label>
                                       <input type="text" class="form-control form-control-sm @error('organisationName') is-invalid @enderror" id="organisationName" name="organisationName" placeholder="Organisation Name" value="{{ old('organisationName') }}">
                                       @if ($errors->has('organisationName'))
                                          <span class="text-danger errorsize">{{ $errors->first('organisationName') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="keyContactPerson">Key Contact Person <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('keyContactPerson') is-invalid @enderror" id="keyContactPerson" name="keyContactPerson" placeholder="key Contact Person" value="{{ old('keyContactPerson') }}">
                                       @if ($errors->has('keyContactPerson'))
                                          <span class="text-danger errorsize">{{ $errors->first('keyContactPerson') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="mobile">Mobile <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
                                       @if ($errors->has('mobile'))
                                          <span class="text-danger errorsize">{{ $errors->first('mobile') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="landlineNumber">Landline Number :  </label>
                                       <input type="text" class="form-control form-control-sm" id="landlineNumber" name="landlineNumber" placeholder="Landline Number" value="{{ old('landlineNumber') }}">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="address">E-mail Address :  </label>
                                       <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" placeholder="E-mail address" value="{{$userRegisterEmailId}}" readonly>
                                       @if ($errors->has('email'))
                                          <span class="text-danger errorsize">{{ $errors->first('email') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="address">Address <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
                                       @if ($errors->has('address'))
                                          <span class="text-danger errorsize">{{ $errors->first('address') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="state">State <span style="color: red;">*</span> :  </label>
                                       {{--<input type="text" class="form-control form-control-sm @error('state') is-invalid @enderror" id="state" name="state" placeholder="State" value="{{ old('state') }}">--}}
                                       <select name="state" id="state" class="form-control form-control-sm @error('state') is-invalid @enderror">
                                       <option value="">Select State</option>
                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                          <option value="Assam">Assam</option>
                                          <option value="Bihar">Bihar</option>
                                          <option value="Chandigarh">Chandigarh</option>
                                          <option value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                          <option value="Daman and Diu">Daman and Diu</option>
                                          <option value="Delhi">Delhi</option>
                                          <option value="Lakshadweep">Lakshadweep</option>
                                          <option value="Puducherry">Puducherry</option>
                                          <option value="Goa">Goa</option>
                                          <option value="Gujarat">Gujarat</option>
                                          <option value="Haryana">Haryana</option>
                                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                          <option value="Jharkhand">Jharkhand</option>
                                          <option value="Karnataka">Karnataka</option>
                                          <option value="Kerala">Kerala</option>
                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                          <option value="Maharashtra">Maharashtra</option>
                                          <option value="Manipur">Manipur</option>
                                          <option value="Meghalaya">Meghalaya</option>
                                          <option value="Mizoram">Mizoram</option>
                                          <option value="Nagaland">Nagaland</option>
                                          <option value="Odisha">Odisha</option>
                                          <option value="Punjab">Punjab</option>
                                          <option value="Rajasthan">Rajasthan</option>
                                          <option value="Sikkim">Sikkim</option>
                                          <option value="Tamil Nadu">Tamil Nadu</option>
                                          <option value="Telangana">Telangana</option>
                                          <option value="Tripura">Tripura</option>
                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                          <option value="Uttarakhand">Uttarakhand</option>
                                          <option value="West Bengal">West Bengal</option>
                                          </select>
                                       @if ($errors->has('state'))
                                          <span class="text-danger errorsize">{{ $errors->first('state') }}</span>
                                       @endif
                                       
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="city">City <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" id="city" name="city" placeholder="City" value="{{ old('city') }}">
                                       @if ($errors->has('city'))
                                          <span class="text-danger errorsize">{{ $errors->first('city') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="pincode">Pincode <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="Pincode" value="{{ old('pincode') }}">
                                       @if ($errors->has('pincode'))
                                          <span class="text-danger errorsize">{{ $errors->first('pincode') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="website">Website :  </label>
                                       <input type="text" class="form-control form-control-sm" id="website" name="website" placeholder="Website" value="{{ old('website') }}">
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
                                       {{--<input type="text" class="form-control form-control-sm @error('modeOfRegistration') is-invalid @enderror" id="modeOfRegistration" name="modeOfRegistration" placeholder="Mode of Registration" value="{{ old('modeOfRegistration') }}"> --}}
                                       <select class="form-control form-control-sm @error('fcra_certificate_exists') is-invalid @enderror" name="fcra_certificate_exists" id="modeOfRegistration"  value="{{ old('modeOfRegistration') }}">
                                          <option value=" ">Select Mode of Registartion</option>
                                          <option value="online">Online</option>
                                          
                                       </select>
                                       
                                       @if ($errors->has('modeOfRegistration'))
                                          <span class="text-danger errorsize">{{ $errors->first('modeOfRegistration') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="dateOfRegistration">Date of Registration <span style="color: red;">*</span> : </label>
                                       <input type="date" class="form-control form-control-sm @error('dateOfRegistration') is-invalid @enderror" id="dateOfRegistration" name="dateOfRegistration" placeholder="Date of Registration" value="{{ old('dateOfRegistration') }}">
                                       @if ($errors->has('dateOfRegistration'))
                                          <span class="text-danger errorsize">{{ $errors->first('dateOfRegistration') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="registrationNumber">Registration No <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('registrationNumber') is-invalid @enderror" id="registrationNumber" name="registrationNumber" placeholder="Registration No" value="{{ old('registrationNumber') }}">
                                       @if ($errors->has('registrationNumber'))
                                          <span class="text-danger errorsize">{{ $errors->first('registrationNumber') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="registrationCertificate">Upload Registration Certificate <span style="color: red;">*</span> :  </label>
                                       <input type="file"  class="form-control form-control-sm @error('registrationCertificate') is-invalid @enderror" id="registrationCertificate" name="registrationCertificate" placeholder="Upload Registration Certificate">
                                    </div>
                                    @if ($errors->has('registrationCertificate'))
                                          <span class="text-danger errorsize">{{ $errors->first('registrationCertificate') }}</span>
                                    @endif
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="taRegistrationNo">12A Registration No <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('taRegistrationNo') is-invalid @enderror" id="taRegistrationNo" name="taRegistrationNo" placeholder="12A Registration No" value="{{ old('taRegistrationNo') }}">
                                       @if ($errors->has('taRegistrationNo'))
                                          <span class="text-danger errorsize">{{ $errors->first('taRegistrationNo') }}</span>
                                    @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="taCertificate">Upload 12A Certificate <span style="color: red;">*</span> :  </label>
                                       <input type="file" class="form-control form-control-sm @error('taCertificate') is-invalid @enderror" id="taCertificate" name="taCertificate" placeholder="12A Certificate">
                                       @if ($errors->has('taCertificate'))
                                          <span class="text-danger errorsize">{{ $errors->first('taCertificate') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="pan">Pan Number <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('pan') is-invalid @enderror" id="pan" name="pan" placeholder="PAN Number" value="{{ $userPanNumabr }}" readonly>
                                       @if ($errors->has('pan'))
                                          <span class="text-danger errorsize">{{ $errors->first('pan') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="darpan">Registered in NGO Darpan  :  </label>
                                       <!-- <input type="text" class="form-control form-control-sm @error('darpan') is-invalid @enderror" id="darpan" name="darpan" placeholder="Registered in NGO Darpan" value="{{ old('darpan') }}"> -->
                                       <select class="form-control form-control-sm @error('darpan') is-invalid @enderror" name="darpan" id="darpan" value="{{ old('darpan') }}">
                                          <option value="">Select Option</option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                       </select>
                                       @if ($errors->has('darpan'))
                                          <span class="text-danger errorsize">{{ $errors->first('darpan') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="tanNumber">Tan No  :  </label>
                                       <input type="text" class="form-control form-control-sm @error('tanNumber') is-invalid @enderror" id="tanNumber" name="tanNumber" placeholder="Tan No" value="{{ old('tanNumber') }}">
                                       @if ($errors->has('tanNumber'))
                                          <span class="text-danger errorsize">{{ $errors->first('tanNumber') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="egNumber">80 G Number <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('egNumber') is-invalid @enderror" id="egNumber" name="egNumber" placeholder="80 G Number" value="{{ old('egNumber') }}">
                                       @if ($errors->has('egNumber'))
                                          <span class="text-danger errorsize">{{ $errors->first('egNumber') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="fcra_certificate_exists">Do you have FCRA <span style="color: red;">*</span> : </label>
                                       <select class="form-control form-control-sm @error('fcra_certificate_exists') is-invalid @enderror" name="fcra_certificate_exists" id="mytest" onchange="showDiv(this)" value="{{ old('fcra_certificate_exists') }}">
                                          <option value="no">No</option>
                                          <option value="yes">Yes</option>
                                          
                                       </select>
                                       @if ($errors->has('fcra_certificate_exists'))
                                          <span class="text-danger errorsize">{{ $errors->first('fcra_certificate_exists') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4" id="FCRA_Regitration_Number" style="display:none;">
                                    <div class="form-group">
                                       <label for="fcraNumber">FCRA Registration Number <span style="color: red;">*</span> :  </label>
                                       <input type="text" class="form-control form-control-sm @error('fcraNumber') is-invalid @enderror" id="fcraNumber" name="fcraNumber" placeholder="FCRA Registration Number" value="{{ old('fcraNumber') }}">
                                       @if ($errors->has('fcraNumber'))
                                          <span class="text-danger errorsize">{{ $errors->first('fcraNumber') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-4" id="FCRA_Renew_Date" style="display:none;">
                                    <div class="form-group">
                                       <label for="fcraRenewalDate">FCRA Renewal Date <span style="color: red;">*</span> :  </label>
                                       <input type="date" class="form-control form-control-sm @error('fcraRenewalDate') is-invalid @enderror" id="fcraRenewalDate" name="fcraRenewalDate" placeholder="FCRA Renewal Date" value="{{ old('fcraRenewalDate') }}">
                                       @if ($errors->has('fcraRenewalDate'))
                                          <span class="text-danger errorsize">{{ $errors->first('fcraRenewalDate') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-4" id="FCRA_Upload_Docx" style="display:none;">
                                    <div class="form-group">
                                       <label for="fcraCertificatefile">Upload FCRA Certificate <span style="color: red;">*</span> :  </label>
                                       <input type="file" class="form-control form-control-sm @error('fcraCertificatefile') is-invalid @enderror" id="fcraCertificatefile" name="fcraCertificatefile">
                                       @if ($errors->has('fcraCertificatefile'))
                                          <span class="text-danger errorsize">{{ $errors->first('fcraCertificatefile') }}</span>
                                       @endif
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
                                            <input type="radio" name="livelihood" value="yes" checked>Yes
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="livelihood" value="no">No
                                          </label>
                                        </div>
                                 </div>
                                 <div class="col-md-6">
                                      <label for="pincode">Focus of the org on PRI:  </label>
                                        <div class="form-group">
                                          <label class="radio-inline">
                                            <input type="radio" name="pri" id="pri" value="yes" checked>Yes
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="pri" id="pri" value="no">No
                                          </label>
                                        </div>
                                 </div>
                                 <div class="col-md-6">
                                  
                                      <label for="pincode">Leveraging resources from govt flagship program :  </label>
                                        <div class="form-group">
                                          <label class="radio-inline">
                                            <input type="radio" name="flagship" id="flagship" value="yes" checked>Yes
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="flagship" id="flagship" value="no">No
                                          </label>
                                        </div>
                                 </div>
                                 <div class="col-md-6">
                                      <label for="pincode">Focus of the org on women:  </label>
                                        <div class="form-group">
                                          <label class="radio-inline">
                                            <input type="radio" name="women" id="women" value="yes" checked>Yes
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="women" id="women" value="no">No
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
                                        <input type="text" class="form-control form-control-sm @error('donor1') is-invalid @enderror"  id="donor1" name="donor1" placeholder="Donor 1" value="{{ old('donor1') }}">
                                          @if ($errors->has('donor1'))
                                             <span class="text-danger errorsize">{{ $errors->first('donor1') }}</span>
                                          @endif
                                       </div>  
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="donor1">Donor 2 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('donor2') is-invalid @enderror" id="donor2" name="donor2" placeholder="Donor 2" value="{{ old('donor2') }}">
                                        @if ($errors->has('donor2'))
                                             <span class="text-danger errorsize">{{ $errors->first('donor2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="donor1">Donor 3 :  </label>
                                        <input type="text" class="form-control form-control-sm" id="donor3" name="donor3" placeholder="Donor 3" value="{{ old('donor3') }}">
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
                                        <input type="text" class="form-control form-control-sm @error('budgetYear1') is-invalid @enderror" id="budgetYear1" name="budgetYear1" value="{{ old('budgetYear1') }}" placeholder="Budget Year 1">
                                          @if ($errors->has('budgetYear1'))
                                             <span class="text-danger errorsize">{{ $errors->first('budgetYear1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="budget1">Budget 1 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('budget1') is-invalid @enderror" id="budget1" name="budget1" placeholder="Budget 1">
                                        @if ($errors->has('budget1'))
                                             <span class="text-danger errorsize">{{ $errors->first('budget1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="budgetYear2">Budget Year 2 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('budgetYear2') is-invalid @enderror" id="budgetYear2" name="budgetYear2" value="{{ old('budgetYear2') }}" placeholder="Budget Year 2">
                                        @if ($errors->has('budgetYear2'))
                                             <span class="text-danger errorsize">{{ $errors->first('budgetYear2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="budget2">Budget 2 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('budget2') is-invalid @enderror" id="budget2" name="budget2" placeholder="Budget 2">
                                        @if ($errors->has('budget2'))
                                             <span class="text-danger errorsize">{{ $errors->first('budget2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="budgetYear3">Budget Year 3 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('budgetYear3') is-invalid @enderror" id="budgetYear3" name="budgetYear3" value="{{ old('budgetYear3') }}" placeholder="Budget Year 3">
                                        @if ($errors->has('budgetYear3'))
                                             <span class="text-danger errorsize">{{ $errors->first('budgetYear3') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="budget3">Budget 3 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('budget3') is-invalid @enderror" id="budget3" name="budget3" placeholder="Budget 3">
                                        @if ($errors->has('budget3'))
                                             <span class="text-danger errorsize">{{ $errors->first('budget3') }}</span>
                                          @endif
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
                                        <input type="text" class="form-control form-control-sm @error('auditReportYear1') is-invalid @enderror" id="auditReportYear1" name="auditReportYear1" value="{{ old('auditReportYear1') }}" placeholder="Donor 1">
                                          @if ($errors->has('auditReportYear1'))
                                             <span class="text-danger errorsize">{{ $errors->first('auditReportYear1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAuditReport">Upload Report 1 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAuditReport1') is-invalid @enderror" id="uploadAuditReport1" name="uploadAuditReport1" placeholder="Donor 2">
                                        @if ($errors->has('uploadAuditReport1'))
                                             <span class="text-danger errorsize">{{ $errors->first('uploadAuditReport1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="auditReportYear2">Year 2 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('auditReportYear2') is-invalid @enderror" id="auditReportYear2" name="auditReportYear2" value="{{ old('auditReportYear2') }}" placeholder="Donor 3">
                                        @if ($errors->has('auditReportYear2'))
                                             <span class="text-danger errorsize">{{ $errors->first('auditReportYear2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAuditReport2">Upload Report 2 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAuditReport2') is-invalid @enderror" id="uploadAuditReport2" name="uploadAuditReport2" placeholder="Donor 2">
                                        @if ($errors->has('uploadAuditReport2'))
                                             <span class="text-danger errorsize">{{ $errors->first('uploadAuditReport2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="auditReportYear3">Year 3 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('auditReportYear3') is-invalid @enderror" id="auditReportYear3" name="auditReportYear3" value="{{ old('auditReportYear3') }}" placeholder="Donor 3">
                                        @if($errors->has('auditReportYear3'))
                                             <span class="text-danger errorsize">{{ $errors->first('auditReportYear3') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAuditReport3">Upload Report 3 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAuditReport3') is-invalid @enderror" id="uploadAuditReport3" name="uploadAuditReport3" placeholder="Donor 2">
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
                                        <input type="text" class="form-control form-control-sm @error('annualReportYear1') is-invalid @enderror" id="annualReportYear1" name="annualReportYear1" value="{{ old('annualReportYear1') }}" placeholder="Annual Report Year1">
                                          @if($errors->has('annualReportYear1'))
                                             <span class="text-danger errorsize">{{ $errors->first('annualReportYear1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAnnualReport1">Upload Annual Report 1 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAnnualReport1') is-invalid @enderror" id="uploadAnnualReport1" name="uploadAnnualReport1" placeholder="Upload Annual Report 1">
                                        @if ($errors->has('uploadAnnualReport1'))
                                             <span class="text-danger errorsize">{{ $errors->first('uploadAnnualReport1') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="annualReportYear2">Year 2 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('annualReportYear2') is-invalid @enderror" id="annualReportYear2" name="annualReportYear2" value="{{ old('annualReportYear2') }}" placeholder="Annual Report Year2">
                                        @if($errors->has('annualReportYear2'))
                                             <span class="text-danger errorsize">{{ $errors->first('annualReportYear2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAnnualReport2">Upload Annual Report 2 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAnnualReport2') is-invalid @enderror" id="uploadAnnualReport2" name="uploadAnnualReport2" placeholder="Upload Annual Report 2">
                                        @if ($errors->has('uploadAnnualReport2'))
                                             <span class="text-danger errorsize">{{ $errors->first('uploadAnnualReport2') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="annualReportYear3">Year 3 <span style="color: red;">*</span> :  </label>
                                        <input type="text" class="form-control form-control-sm @error('annualReportYear3') is-invalid @enderror" id="annualReportYear3" name="annualReportYear3" value="{{ old('annualReportYear3') }}" placeholder="Annual Report Year3">
                                        @if($errors->has('annualReportYear3'))
                                             <span class="text-danger errorsize">{{ $errors->first('annualReportYear3') }}</span>
                                          @endif
                                       </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="uploadAnnualReport3">Upload Annual Report 3 <span style="color: red;">*</span> :  </label>
                                        <input type="file" class="form-control form-control-sm @error('uploadAnnualReport3') is-invalid @enderror" id="uploadAnnualReport3" name="uploadAnnualReport3" placeholder="Upload Annual Report 3">
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
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                     <button type="submit" class="btn btn-success">Submit</button>
                     &nbsp;&nbsp;&nbsp;
                     <button type="submit" class="btn btn-danger">Cancel</button>
                     </div>
                     <div class="col-md-4"></div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div style="height:10px; clear:both;"></div>
      <script type="text/javascript">
      function showDiv(select){
         if(select.value=='yes'){
            document.getElementById('FCRA_Renew_Date').style.display = "block";
            document.getElementById('FCRA_Upload_Docx').style.display = "block";
            document.getElementById('FCRA_Regitration_Number').style.display = "block";
         } else{
            document.getElementById('FCRA_Renew_Date').style.display = "none";
            document.getElementById('FCRA_Upload_Docx').style.display = "none";
            document.getElementById('FCRA_Regitration_Number').style.display = "none";
         }
      } 
      </script>
      
      <!-- Main Footer -->
      <footer class="main-footer">
         <!-- To the right -->
         <div class="float-right d-none d-sm-inline">
            Anything you want
         </div>
         <!-- Default to the left -->
         <strong>Copyright &copy; 2023-2024 <a href="https://www.brlf.in/">BRLF</a>.</strong> All rights reserved.
      </footer>
   </body>
 
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>