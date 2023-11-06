<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CsoProjectDetail;
use App\Models\Project;
use App\Models\User;
use App\Models\Block;
use App\Models\UserProject;
use App\Mail\CsoProjectDetailMail;
use App\Mail\CsoCreateProjectDetailMai; 

class CsoCreateProjectDetailController extends Controller
{
   public function index(Request $request)
   {
        

        $csoProjectDetails = DB::table('users as u')
        ->join('user_project as up', 'u.id', '=', 'up.user_id')
        ->join('projects as p', 'p.id', '=', 'up.project_id')
        ->join('cso_project_details as cpd', 'u.id', '=', 'cpd.user_id')
        ->select('p.*', 'up.*', 'cpd.status as cpd_status','u.name', 'u.email','u.mobile','u.pan','u.email_verified_at')
        ->whereNotNull('u.email_verified_at')
        ->where('u.registration_complete', 1)
        ->where('u.status', 'A')
        ->get();
        //dd($csoProjectDetails);

        return view('admin.csocreateproejctdetail', compact(['csoProjectDetails']));
   }

   public function show(Request $request, $p_id, $u_id)
   {
        
        // $csoCreateProjectDetails = DB::table('projects as p')
        // ->join('cso_project_details as cpd', 'p.id', '=', 'cpd.project_id')
        // ->join('user_project as up', 'p.id', '=', 'up.project_id')
        // ->join('users as u', 'u.id', '=', 'cpd.user_id')
        // ->select('p.*', 'cpd.*','cpd.id as cpd_id', 'u.name', 'u.email','u.mobile','u.pan', 'up.user_id', 'up.project_id', 'up.cso_create_project_status')
        // ->whereNotNull('u.email_verified_at')
        // ->where('u.registration_complete', 1)
        // ->where('u.status', 'A')
        // ->where('up.cso_create_project_status', 1)
        // ->where('p.id',1)
        // ->first();

        $csoCreateProjectDetails = DB::table('users as u')
        ->join('user_project as up', 'u.id', '=', 'up.user_id')
        ->join('projects as p', 'p.id', '=', 'up.project_id')
        ->join('cso_project_details as cpd', 'u.id', '=', 'cpd.user_id')
        ->select('p.*', 'up.*','cpd.*','cpd.id as cpd_id', 'u.name', 'u.email','u.mobile','u.pan','u.email_verified_at')
        ->whereNotNull('u.email_verified_at')
        ->where('u.registration_complete', 1)
        ->where('u.status', 'A')
        ->where('up.cso_create_project_status', 1)
        ->where('cpd.project_id', $p_id)
        ->where('cpd.user_id', $u_id)
        ->first();

       // dd($csoCreateProjectDetails);
        
        return view('admin.viewcsocreateprojectdetails', compact(['csoCreateProjectDetails']));
   }


   public function update(Request $request)
   {
    
     $userId = $request->user_id;
     $projectId = $request->project_id;
     $cpdId = $request->cpd_id;
     $status = $request->status;
     $userEmail = User::where('id', $userId)->first();
     //dd($userId,$projectId,$cpdId,$status,$userEmail);
     if($status == "A")
     {
        
        DB::table('cso_project_details')
                ->where('user_id', $userId)
                ->where('project_id', $projectId)
                ->where('id', $cpdId)
                ->update(['status' => 1]);
                $project = Project::find($projectId); 
                Mail::to($userEmail->email)
                ->send(new CsoCreateProjectDetailMai(Auth::user(), $project, $status));
                sweetalert()->addSuccess('Project Approved to the '.$userEmail->name.' !');
            return redirect('cso/createprojectlist');
     }
     else{
        DB::table('cso_project_details')
                ->where('user_id', $userId)
                ->where('project_id', $projectId)
                ->where('id', $cpdId)
                ->update(['status' => 0]);
        $project = Project::find($projectId); 
                Mail::to($userEmail->email)
                ->send(new CsoCreateProjectDetailMai(Auth::user(), $project, $status));
                sweetalert()->addSuccess('Project Rejected to the '.$userEmail->name.' !');
            return redirect('cso/createprojectlist');
     }
    
            
   }
}