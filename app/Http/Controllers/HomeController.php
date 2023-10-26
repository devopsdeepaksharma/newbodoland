<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Auth;
use App\Models\PartnerBasicDetails;
use App\Models\RegistrationDetail;
use App\Models\OrganisationProfile;
use App\Models\MajorDonor;
use App\Models\BudgetInformation;
use App\Models\AuditReport;
use App\Models\AnnualReport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
        $getUserId = Auth::User()->id;
        // $user = Auth::user();
        // $roles = $user->getRoleNames();
        // dd($roles);
       
        $getUserData = User::where('id',$getUserId)->first();
 
        //check user already registerd or not
        $basicDetailTableCheck = PartnerBasicDetails::where('user_id', $getUserId)->first();
        $registrationTableCheck = RegistrationDetail::where('user_id', $getUserId)->first();
        $organisationTableCheck = OrganisationProfile::where('user_id', $getUserId)->first();
        $majorDonorTableCheck = MajorDonor::where('user_id', $getUserId)->first();
        $budgetInfoTableCheck = BudgetInformation::where('user_id', $getUserId)->first();
        $auditReportTableCheck = AuditReport::where('user_id', $getUserId)->first();
        $annualReportTableCheck = AnnualReport::where('user_id', $getUserId)->first();
        //dd($basicDetailTableCheck,$registrationTableCheck,$organisationTableCheck,$majorDonorTableCheck,$budgetInfoTableCheck,$auditReportTableCheck,$annualReportTableCheck);
       
        //dd($basicDetailTableCheck == null && $registrationTableCheck == null &&  $organisationTableCheck == null && $majorDonorTableCheck == null && $budgetInfoTableCheck == null && $auditReportTableCheck==null && $annualReportTableCheck==null);
        //dd($getUserData->registration_complete == 1 && $getUserData->status == 'A');
        //echo auth()->user()->getRoleNames();
        //die();
        if($getUserData->registration_complete == 0 && $getUserData->status == 'P')
        {
            return view('cso.csoregistration', compact('getUserData'));
        }
        elseif($getUserData->registration_complete == 1 && $getUserData->status == 'P')
        {
            return view('cso.afterregistration', compact('getUserData'));
        }
        elseif($getUserData->registration_complete == 1 && $getUserData->status == 'A')
        {
            return view('admin.dashboard');
        }
        else
        {
            
            return view('admin.dashboard');
        }


        
        
        
        //return view('home');
    }

   
}
