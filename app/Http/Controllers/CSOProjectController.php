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

class CSOProjectController extends Controller
{
    public function index(Request $request)
    {
        $csoProjectDetails = DB::table('projects as p')
        ->join('user_project as up', 'p.id', '=', 'up.project_id')
        ->select('p.*','up.user_id', 'up.project_id','up.cso_create_project_status')
        ->where('up.user_id', Auth::user()->id)
        ->get();
          
        $getCsoProjectDetails = CsoProjectDetail::where('user_id',Auth::user()->id)->first();
        if($getCsoProjectDetails == 'Null' || $getCsoProjectDetails == '')
        {
            $getCsoProjectStatus = 0;
        }
        else{
            $getCsoProjectStatus =$getCsoProjectDetails->status;
        }
        //dd($csoProjectDetails, $getCsoProjectStatus);

       //dd($getCsoProjectDetails,Auth::user()->id,$getCsoProjectStatus);
        
        return view('cso.projectlist', compact('csoProjectDetails','getCsoProjectDetails','getCsoProjectStatus'));
    }


    public function createprojectdetail(Request $request, $pro_id, $user_id)
    {
        return view('cso.createprojectdetail', compact(['pro_id', 'user_id']));
    }


    public function storeprojectdetail(Request $request)
    {
        $request->validate([
            'state'         => ['required'],
            'district'      => ['required'],
            'block'         => ['required'],
            'vcdc'          => ['required'],
            'village'       => ['required', 'max:50'],
            'household'     => ['required', 'max:5'],
            'hr'            => ['required', 'max:8'],
            'adminBudget'   => ['required', 'max:8'],
            'program'       => ['required', 'max:8'],
            'source'        => ['required'],
        ], [
            'state.required' => 'State field is required',
            'district.required' => 'District field is required',
            'block.required' => 'Block field is required',
            'vcdc.required' => 'VCDC field is required',
            'village.required' => 'Village field is required',
            'household.required' => 'Household field is required',
            'hr.required' => 'HR field is required',
            'adminBudget.required' => 'Admin field is required',
            'program.required' => 'Program field is required',
            'source.required' => 'Other Source field is required',
        ]);

        try{
            DB::transaction(function () use ($request) {
                $userId = Auth::user()->id;
                $otherFundingSources = $request->input('source', []);
                $otherFundingSources = implode(', ', $otherFundingSources);

                $CsoProjectDetail                            = new CsoProjectDetail();
                $CsoProjectDetail->state_id                  = $request->state;
                $CsoProjectDetail->block_id                  = $request->block;
                $CsoProjectDetail->vcdc_id                   = $request->vcdc;
                $CsoProjectDetail->village_count             = $request->village;
                $CsoProjectDetail->household_count           = $request->household;
                $CsoProjectDetail->hr_budget                 = $request->hr;
                $CsoProjectDetail->admin_budget              = $request->adminBudget;
                $CsoProjectDetail->program_name              = $request->program;
                $CsoProjectDetail->fund_source               = $otherFundingSources;
                $CsoProjectDetail->user_id                   = $userId;
                $CsoProjectDetail->project_id                = $request->project_id;
                $CsoProjectDetail->save();


                DB::table('user_project')
                ->where('user_id', $userId)
                ->where('project_id', $request->project_id)
                ->update(['cso_create_project_status' => 1]);
            });

            $project = Project::find($request->project_id);
            Mail::to(Auth::user()->email)
            ->cc("aashutosh.quantum@gmail.com")
            ->send(new CsoProjectDetailMail(Auth::user(), $project));

            sweetalert()->addSuccess('You have Successfully Created Project Details!. We will back to you soon.');
            return redirect('cso/projectlist');
        } catch (\Exception $e) {
            dd($e->getMessage());
            sweetalert()->addError('Some error Occured while saving data. Contact Admin!');
            return back();
        }
        
      
    }

    public function approvedprojectdetail(Request $request)
    {
        return view('cso.approvedproject');
    }

    
}
