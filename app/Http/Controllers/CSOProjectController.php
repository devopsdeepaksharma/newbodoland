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
use App\Models\CsoCreateProjectDetail;
use App\Models\Project;
use App\Models\UserProject;

class CSOProjectController extends Controller
{
    public function index(Request $request)
    {
        $getSmpuProjectDetails = DB::table('projects as p')
        ->join('user_project as up', 'p.id', '=', 'up.project_id')
        ->select('p.*','up.user_id', 'up.project_id','up.cso_create_project_status')
        ->get();
        $getCsoCreateProjectDetails = CsoCreateProjectDetail::where('cso_create_project_status',1)->get();
        
        return view('cso.projectlist', compact(['getCsoCreateProjectDetails','getSmpuProjectDetails']));
    }


    public function createprojectdetail(Request $request, $pro_id, $user_id)
    {
        
        return view('cso.createprojectdetail', compact(['pro_id', 'user_id']));
    }


    public function storeprojectdetail(Request $request)
    {
        $request->validate([
            'state' => ['required', 'max:50'],
            'block' => ['required', 'max:50'],
            'vcdc' => ['required', 'max:50'],
            'village' => ['required', 'max:50'],
            'household' => ['required', 'max:5'],
            'hr' => ['required', 'max:8'],
            'adminBudget' => ['required', 'max:8'],
            'program' => ['required', 'max:8'],
            'source' => ['required'],
            
        ], [
            'state.required' => 'State field is required',
            'block.required' => 'Block field is required',
            'vcdc.required' => 'VCDC field is required',
            'village.required' => 'Village field is required',
            'household.required' => 'Household field is required',
            'hr.required' => 'HR field is required',
            'adminBudget.required' => 'Admin field is required',
            'program.required' => 'Program field is required',
            'source.required' => 'Other Source field is required',
            
        ]
    
        );

        $userId = Auth::user()->id;
        $otherFundingSources = $request->input('source', []);
        $otherFundingSources = implode(', ', $otherFundingSources);
        $csoCreateProjectDetails = new CsoCreateProjectDetail();
        $csoCreateProjectDetails->state = $request->state;
        $csoCreateProjectDetails->block = $request->block;
        $csoCreateProjectDetails->vcdc = $request->vcdc;
        $csoCreateProjectDetails->village = $request->village;
        $csoCreateProjectDetails->household = $request->household;
        $csoCreateProjectDetails->hr = $request->hr;
        $csoCreateProjectDetails->admin_budget = $request->adminBudget;
        $csoCreateProjectDetails->program = $request->program;
        $csoCreateProjectDetails->source = $otherFundingSources;
        $csoCreateProjectDetails->user_id = $request->user_id;
        $csoCreateProjectDetails->project_id = $request->project_id;
        $csoCreateProjectDetails->cso_create_project_status = 1;
        //$csoCreateProjectDetails->save();

        DB::table('user_project')
            ->where('user_id', $request->user_id)
            ->where('project_id', $request->project_id)
            ->update(['cso_create_project_status' => 1]);
        sweetalert()->addSuccess('You have Successfully Created Project Details!. We will back to you soon.');
        return redirect('cso/projectlist');

        Mail::to('deepakatal2911@gmail.com')->send(new MyEmail());
        return "Email sent successfully!";
        
      
    }

    public function approvedprojectdetail(Request $request)
    {
        return view('cso.approvedproject');
    }

    
}
