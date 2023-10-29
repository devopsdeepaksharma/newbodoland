<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Mail;
use Validator;
use App\Models\User;
use App\Models\Project;
use App\Models\UserProject;
use Illuminate\Http\Request;
use App\Mail\AssignProjectMail;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();
        return view('project.index', compact('data'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'tenure' => 'required|max:5',
            'status' => 'required|in:0,1',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        try {
            DB::transaction(function () use ($request) {
                Project::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'location' => $request->location,
                    'duration' => $request->tenure,
                    'status' => $request->status,
                    
                ]);
                return "Saved";
            });
        }
        catch (\Throwable $e) {
            return $e->getMessage();
        }
        sweetalert()->addSuccess('Project Created!');
        return redirect()->route('projects.index')->with('message','Project Created!');
    }


    public function edit($id)
    {
        $data = Project::findOrFail($id);
        return view('project.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }
        try {
            DB::transaction(function () use ($request, $id) {
                $project = Project::find($id);
                $project->title = $request->title;
                $project->description = $request->description;
                $project->status = $request->status;
                $project->save();
            });
        }
        catch (\Throwable $e) {
            return $e->getMessage();
        }
        return redirect()->route('projects.index')->with('message','Project Updated!');

    }

    public function assignProject(Request $request)
    {
       $projectId = $request->project_id;
       $userId = $request->user_id;

       $check = UserProject::where('user_id', $userId)
                ->where('project_id', $projectId)
                ->exists();
        
        if($check) {
            return back()->with('message','Something went wrong!');
        } else {
            try {
                DB::transaction(function () use ($projectId, $userId) {
                    UserProject::create([
                        'project_id' => $projectId,
                        'user_id' => $userId
                    ]);

                    $user = User::find($userId);
                    $project = Project::find($projectId);
                    Mail::to($user->email)->send(new AssignProjectMail($project, $user));
                });
            } catch (\Throwable $e) {
                return $e->getMessage();
            }
            
            return back()->with('message','Project Linked!');
        }
    }

    public function delete($id)
    {
        try{
            DB::transaction(function () use($id) {
                $project =  Project::find($id);
                $project->delete();
            });
        } catch(\Throwable $e) {
            return $e->getMessage();
        }

        return back()->with('message','Project Deleted!');
    }
}
