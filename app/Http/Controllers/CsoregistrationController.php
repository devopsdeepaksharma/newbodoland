<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use DB;
use Session;
use File;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\Helper\ImageManager;
use Illuminate\Support\Facades\Validator;
use App\Rules\PanNumber;
use App\Models\User;
use App\Models\PartnerBasicDetails;
use App\Models\RegistrationDetail;
use App\Models\OrganisationProfile;
use App\Models\MajorDonor;
use App\Models\BudgetInformation;
use App\Models\AuditReport;
use App\Models\AnnualReport;
use App\Models\MyStates;
use App\Models\MyCities;
use App\Models\CsoProejctDetail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\csoFinalRegistraionFormSubmit;
use Carbon\Carbon;

class CsoregistrationController extends Controller
{
    use ImageManager;

    public function index(Request $request)
    {
        $maxDate = date('Y-m-d');

        $minDate = date('Y-m-d', strtotime('-3 year'));
        //dd($minDate);
        
        $currentYear = date("Y");
        $lastCurrentYear = $currentYear - 1;
        $fY = $lastCurrentYear.' - '.$currentYear;
        
        $secondLastCurrentYear = $lastCurrentYear - 1;
        $thirdLastCurrentYear = $secondLastCurrentYear - 1;
        $fY1 = $secondLastCurrentYear.' - '.$lastCurrentYear;
        $fY2 = $thirdLastCurrentYear.' - '.$secondLastCurrentYear;
        //dd($fY,$fY1,$fY2);
        $userRegisterEmailId = Auth::user()->email;
        $userPanNumabr = Auth::user()->pan;
        $myStates = MyStates::orderBy('name', 'asc')->get();
        //dd($myStates);
       
        

        
        return view('cso.csoregistrationform', compact(['userRegisterEmailId','userPanNumabr', 'currentYear', 'lastCurrentYear', 'secondLastCurrentYear','fY','fY1','fY2','myStates','maxDate','minDate']));
    }

    public function getcityname(Request $request)
    {
        
        $data['cities'] = MyCities::where("state_id",$request->state_id)
                    ->get(["city","state_id"]);
        return response()->json($data);
    }

    

    public function store(Request $request)
    {
        

        $request->validate([
            'headOfOrganisation' => 'required',
            'organisationName' => 'required',
            'keyContactPerson' => 'required',
            'mobile' => ['required', 'max:10'],
            'address' => ['required', 'max:100'],
            'state' => 'required',
            'city' => 'required',
            'pincode' => ['required', 'max:6', 'regex:/^[1-9]{1}[0-9]{2}[0-9]{3}$/'],
            'modeOfRegistration' => ['required', 'max:50'],
            'dateOfRegistration' => 'required',
            'registrationNumber' => 'required',
            'registrationCertificate' => 'required|mimes:pdf|max:5120',
            'taRegistrationNo' => 'required',
            'taCertificate' => 'required|mimes:pdf|max:5120',
            'taRegistrationNo' => 'required',
            'pan' => ['required','max:10', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'],
            //'darpan' => ['required', 'max:50'],
            //'tanNumber' => ['required', 'max:50'],
            'egNumber' => ['required', 'max:50'],
            'fcra_certificate_exists' => 'required',
            'fcraNumber' => ['required_if:fcra_certificate_exists,==,yes', 'max:50'],
            //'fcraRenewalDate' => 'required_if:fcra_certificate_exists,==,yes',
            'fcraCertificatefile' => 'required_if:fcra_certificate_exists,==,yes|mimes:pdf|max:5120',
            'donor1' => ['required', 'max:50'],
            'donor2' => ['required', 'max:50'],
            'budgetYear1' => ['required', 'max:20'],
            'budget1' => ['required', 'max:20'],
            'budgetYear2' => ['required', 'max:20'],
            'budget2' => ['required', 'max:20'],
            'budgetYear3' => ['required', 'max:20'],
            'budget3' => ['required', 'max:20'],
            'auditReportYear1' => 'required',
            'uploadAuditReport1' => 'required|mimes:pdf|max:5120',
            'auditReportYear2' => 'required',
            'uploadAuditReport2' => 'required|mimes:pdf|max:5120',
            'auditReportYear3' => 'required',
            'uploadAuditReport3' => 'required|mimes:pdf|max:5120',
            'annualReportYear1' => 'required',
            'uploadAnnualReport1' => 'required|mimes:pdf|max:5120',
            'annualReportYear2' => 'required',
            'uploadAnnualReport2' => 'required|mimes:pdf|max:5120',
            'annualReportYear3' => 'required',
            'uploadAnnualReport3' => 'required|mimes:pdf|max:5120',
        ], [
            'headOfOrganisation.required' => 'Head of Organization name is required',
            'organisationName.required' => 'Organization name is required',
            'keyContactPerson.required' => 'Key Contact Person name is required',
            'mobile.required' => 'Mobile Number is required',
            'address.required' => 'Address is required',
            'state.required' => 'State is required',
            'city.required' => 'City is required',
            'pincode.required' => 'Pincode is required',
            'modeOfRegistration.required' => 'Mode of Registartion is required',
            'dateOfRegistration.required' => 'Date of Registartion is required',
            'registrationNumber.required' => 'Registartion Number is required',
            'taRegistrationNo.required' => '12A Registartion Number is required',
            'pan.required' => 'Please enter valid PAN Number',
            //'darpan.required' => 'NGO Darpan Number is required',
            //'tanNumber.required' => 'Tan Number is required',
            'egNumber.required' => '80G Number is required',
            'fcraNumber.required' => 'FCRA Number is required',
            'fcra_certificate_exists.required' => 'This Field is required',
            'fcraRenewalDate.required' => 'FCRA Renewal Field is required',
            
        ]
    
        );

        try {

            DB::transaction(function() use ($request) {

                $userId = Auth::user()->id;
                $getUserId = Auth::User()->id;
       
                $getUserData = User::where('id',$getUserId)->first();
     
                //Insert Basic Details
                $partnerBasicDetails = new PartnerBasicDetails();
                $partnerBasicDetails->org_head = $request->headOfOrganisation;
                $partnerBasicDetails->org_name = $request->organisationName;
                $partnerBasicDetails->org_contact_person = $request->keyContactPerson;
                $partnerBasicDetails->org_mobile = $request->mobile;
                $partnerBasicDetails->org_landline = $request->landlineNumber;
                $partnerBasicDetails->org_address = $request->address;
                $partnerBasicDetails->org_email = $request->email;
                $partnerBasicDetails->org_state = $request->state;
                $partnerBasicDetails->org_district = $request->city;
                $partnerBasicDetails->org_website = $request->website;
                $partnerBasicDetails->org_pincode = $request->pincode;
                $partnerBasicDetails->user_id = $userId;
                $partnerBasicDetails->created_by = $userId;
                $partnerBasicDetails->save();
        
                //Insert Registartion Details
                $partnerRegistrationDetails = new RegistrationDetail();
                $partnerRegistrationDetails->modeofregistartion = $request->modeOfRegistration;
                $partnerRegistrationDetails->dateofregistartion = $request->dateOfRegistration;
                $partnerRegistrationDetails->registartion_number = $request->registrationNumber;
                if($request->hasFile('registrationCertificate')) 
                {   
                    $userRegistrationCertificate = $request->file('registrationCertificate');
                    $userRegistrationFileName = uniqid($userId . '_').".".$userRegistrationCertificate->getClientOriginalExtension(); 
                    $userRegistrationCertificate->storeAs('public/assets/registrationcertificate', $userRegistrationFileName);
                }
                $partnerRegistrationDetails->registartion_certificate = $userRegistrationFileName;
                $partnerRegistrationDetails->TA_registration_number = $request->taRegistrationNo;
                if($request->hasFile('taCertificate')) 
                {   
                    $userTACertificate = $request->file('taCertificate');
                    $TAFileName = uniqid($userId . '_').".".$userTACertificate->getClientOriginalExtension(); 
                    $userTACertificate->storeAs('public/assets/12Acertificate', $TAFileName);
                }
                $partnerRegistrationDetails->TA_certificate = $TAFileName;

                $partnerRegistrationDetails->pan = $request->pan;
                $partnerRegistrationDetails->in_darpan = $request->darpan;
                $partnerRegistrationDetails->tan_number = $request->tanNumber;
                $partnerRegistrationDetails->EG_number = $request->egNumber;
                $partnerRegistrationDetails->fcra_number = $request->fcraNumber;
                $partnerRegistrationDetails->in_fcra = $request->fcra_certificate_exists;
                $partnerRegistrationDetails->fcra_renewal_date = $request->fcraRenewalDate;
                if($request->hasFile('fcraCertificatefile')) 
                {  
                    $userFCRACertificate = $request->file('fcraCertificatefile');
                    $FCRAFileName = uniqid($userId . '_').".".$userFCRACertificate->getClientOriginalExtension(); 
                    $userFCRACertificate->storeAs('public/assets/FCRAcertificate', $FCRAFileName);
                    $partnerRegistrationDetails->fcra_certificate = $FCRAFileName;
                }
            
                $partnerRegistrationDetails->user_id = $userId;
                $partnerRegistrationDetails->save();

                //Insert Orgnisation Profile
                $partnerOrganisationDetail = new OrganisationProfile();
                $partnerOrganisationDetail->tribal_livelihood = $request->livelihood;
                $partnerOrganisationDetail->pri = $request->pri;
                $partnerOrganisationDetail->flagship = $request->flagship;
                $partnerOrganisationDetail->focus_on_women = $request->women;
                $partnerOrganisationDetail->user_id = $userId;
                $partnerOrganisationDetail->save();

                //Insert Major Donor
                $partnerMajorDonor = new MajorDonor();
                $partnerMajorDonor->donor1 = $request->donor1;
                $partnerMajorDonor->donor2 = $request->donor2;
                $partnerMajorDonor->donor3 = $request->donor3;
                $partnerMajorDonor->user_id = $userId;
                $partnerMajorDonor->save();

                //Insert budget Information
                $partnerBudgetInformation =  new BudgetInformation();
                $partnerBudgetInformation->budget_year1 = $request->budgetYear1;
                $partnerBudgetInformation->budget1 = $request->budget1;
                $partnerBudgetInformation->budget_year2 = $request->budgetYear2;
                $partnerBudgetInformation->budget2 = $request->budget2;
                $partnerBudgetInformation->budget_year3 = $request->budgetYear3;
                $partnerBudgetInformation->budget3 = $request->budget3;
                $partnerBudgetInformation->user_id = $userId;
                $partnerBudgetInformation->save();

                //Insert Audit Report
                $partnerAuditReport =  new AuditReport();
                $partnerAuditReport->audit_year1 = $request->auditReportYear1;
                if($request->hasFile('uploadAuditReport1')) 
                {  
                    $uploadAuditReport1 = $request->file('uploadAuditReport1');
                    $uploadAuditReport1FileName = uniqid($userId . '_').".".$uploadAuditReport1->getClientOriginalExtension(); 
                    $uploadAuditReport1->storeAs('public/assets/AuditReport', $uploadAuditReport1FileName);
                }
                $partnerAuditReport->audit_report1 = $uploadAuditReport1FileName;
                $partnerAuditReport->audit_year2 = $request->auditReportYear2;
                if($request->hasFile('uploadAuditReport2')) 
                {  
                    $uploadAuditReport2 = $request->file('uploadAuditReport2');
                    $uploadAuditReport2FileName = uniqid($userId . '_').".".$uploadAuditReport2->getClientOriginalExtension(); 
                    $uploadAuditReport2->storeAs('public/assets/AuditReport', $uploadAuditReport2FileName);
                }
                $partnerAuditReport->audit_report2 = $uploadAuditReport2FileName;
                $partnerAuditReport->audit_year3 = $request->auditReportYear3;
                if($request->hasFile('uploadAuditReport3')) 
                {  
                    $uploadAuditReport3 = $request->file('uploadAuditReport3');
                    $uploadAuditReport3FileName = uniqid($userId . '_').".".$uploadAuditReport3->getClientOriginalExtension(); 
                    $uploadAuditReport3->storeAs('public/assets/AuditReport', $uploadAuditReport3FileName);
                }
                $partnerAuditReport->audit_report3 = $uploadAuditReport3FileName;
                $partnerAuditReport->user_id = $userId;
                $partnerAuditReport->save();

                //Insert Annual Report
                $partnetAnnualReport =  new AnnualReport();
                $partnetAnnualReport->annual_year1 = $request->annualReportYear1;
                if($request->hasFile('uploadAnnualReport1')) 
                {  
                    $uploadAnnualReport1 = $request->file('uploadAnnualReport1');
                    $uploadAnnualReport1FileName = uniqid($userId . '_').".".$uploadAnnualReport1->getClientOriginalExtension(); 
                    $uploadAnnualReport1->storeAs('public/assets/AnnualReport', $uploadAnnualReport1FileName);
                }
                $partnetAnnualReport->annual_report1 = $uploadAnnualReport1FileName;
                $partnetAnnualReport->annual_year2 = $request->annualReportYear2;
                if($request->hasFile('uploadAnnualReport2')) 
                {  
                    $uploadAnnualReport2 = $request->file('uploadAnnualReport2');
                    $uploadAnnualReport2FileName = uniqid($userId . '_').".".$uploadAnnualReport2->getClientOriginalExtension(); 
                    $uploadAnnualReport2->storeAs('public/assets/AnnualReport', $uploadAnnualReport2FileName);
                }
                $partnetAnnualReport->annual_report2 = $uploadAnnualReport2FileName;
                $partnetAnnualReport->annual_year3 = $request->annualReportYear3;
                if($request->hasFile('uploadAnnualReport3')) 
                {  
                    $uploadAnnualReport3 = $request->file('uploadAnnualReport3');
                    $uploadAnnualReport3FileName = uniqid($userId . '_').".".$uploadAnnualReport3->getClientOriginalExtension(); 
                    $uploadAnnualReport3->storeAs('public/assets/AnnualReport', $uploadAnnualReport3FileName);
                }
                $partnetAnnualReport->annual_report3 = $uploadAnnualReport3FileName;
                $partnetAnnualReport->user_id = $userId;
                $partnetAnnualReport->save();

                
                
                //check user already registerd or not
                $basicDetailTableCheck = PartnerBasicDetails::where('user_id', $getUserId)->first();
                $registrationTableCheck = RegistrationDetail::where('user_id', $getUserId)->first();
                $organisationTableCheck = OrganisationProfile::where('user_id', $getUserId)->first();
                $majorDonorTableCheck = MajorDonor::where('user_id', $getUserId)->first();
                $budgetInfoTableCheck = BudgetInformation::where('user_id', $getUserId)->first();
                $auditReportTableCheck = AuditReport::where('user_id', $getUserId)->first();
                $annualReportTableCheck = AnnualReport::where('user_id', $getUserId)->first();

                if($basicDetailTableCheck != null && $registrationTableCheck != null &&  $organisationTableCheck != null && $majorDonorTableCheck != null && $budgetInfoTableCheck != null && $auditReportTableCheck!=null && $annualReportTableCheck!=null)
                {
                    $updateUserRegistrationStatus = User::where('id',$userId)->first();
                    $updateUserRegistrationStatus->registration_complete = 1;
                    $updateUserRegistrationStatus->status = 'P';
                    $updateUserRegistrationStatus->save();

                    
                }

                // Below Mail will be send to User and Admin
                Mail::to(Auth::user()->email)->send(new csoFinalRegistraionFormSubmit(Auth::user()));
                });
                sweetalert()->addSuccess('You have Successfully Registered with us!.');
                return redirect()->route('awatingforapproval');

        } catch(\Exception $e) {
            return ['message' => $e->getMessage() , 'lineNumber' => $e->getLine()];
            sweetalert()->addSuccess('Some Error Occured!');
            return back();
        }

    }

    public function awatingforapproval(Request $request)
    {
        $getUserId = Auth::User()->id;
        $getUserData = User::where('id',$getUserId)->first();

        $basicDetailTableCheck = PartnerBasicDetails::where('user_id', $getUserId)->first();
        $registrationTableCheck = RegistrationDetail::where('user_id', $getUserId)->first();
        $organisationTableCheck = OrganisationProfile::where('user_id', $getUserId)->first();
        $majorDonorTableCheck = MajorDonor::where('user_id', $getUserId)->first();
        $budgetInfoTableCheck = BudgetInformation::where('user_id', $getUserId)->first();
        $auditReportTableCheck = AuditReport::where('user_id', $getUserId)->first();
        $annualReportTableCheck = AnnualReport::where('user_id', $getUserId)->first();
        if($getUserData->registration_complete == 0 && $getUserData->status == 'P')
        {
            return view('cso.csoregistration', compact('getUserData'));
        }
        elseif($getUserData->registration_complete == 1 && $getUserData->status == 'P')
        {
            return view('cso.afterregistration', compact('getUserData'));
        }
        else
        {
            
            return view('admin.dashboard');
        }
        return view('cso.afterregistration', compact('getUserData'));
    }
}
