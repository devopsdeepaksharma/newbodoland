<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Mail;
use App\Models\PartnerBasicDetails;
use App\Models\RegistrationDetail;
use App\Models\OrganisationProfile;
use App\Models\BudgetInformation;
use App\Models\MajorDonor;
use App\Models\AnnualReport;
use App\Models\UserProject;
use App\Models\AuditReport;
use App\Models\User;
use App\Models\MyStates;
use App\Models\MyCities;
use App\Mail\approveApplicationMail;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::role('CSO')->with(['projects' => function($query){
            $query->select('projects.id');
        }]);
        $query->role('CSO');
        if( $request->has('status') && $request->status == 'P') {
            $query->where('status', 'P');
        }
        if( $request->has('status') && $request->status == 'A') {
            $query->where('status', 'A');
        }
        $data = $query->orderBy('id','DESC')->paginate(5)->appends(request()->query());
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
       
        $currentYear = date("Y");
        $lastCurrentYear = $currentYear - 1;
        $fY = $lastCurrentYear.' - '.$currentYear;
        
        $secondLastCurrentYear = $lastCurrentYear - 1;
        $thirdLastCurrentYear = $secondLastCurrentYear - 1;
        $fY1 = $secondLastCurrentYear.' - '.$lastCurrentYear;
        $fY2 = $thirdLastCurrentYear.' - '.$secondLastCurrentYear;
        
        $annualReport = AnnualReport::where('user_id', $id)->first();
        $auditReport = AuditReport::where('user_id', $id)->first();
        $budgetInformation = BudgetInformation::where('user_id', $id)->first();
        $organisationProfile = OrganisationProfile::where('user_id', $id)->first();
        $partnerBasicDetails = PartnerBasicDetails::where('user_id', $id)->first();
        $registrationDetail = RegistrationDetail::where('user_id', $id)->first();
        $majorDonor = MajorDonor::where('user_id', $id)->first();
        ///dd($user,$annualReport,$auditReport,$budgetInformation, $organisationProfile,$partnerBasicDetails,$registrationDetail,$majorDonor);
        return view('users.show',compact('user','majorDonor','registrationDetail','partnerBasicDetails','annualReport','auditReport','budgetInformation','organisationProfile','fY','fY1','fY2'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $projects = UserProject::where('user_id', $id)
                    ->join('projects','projects.id', 'user_project.project_id')
                    ->get('projects.*');      
        return view('users.edit',compact('user','roles','userRole','projects'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'status'=>'required',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }


    public function changeStatus(Request $request)
    {
        try {
            $user = User::find($request->userId);
            DB::transaction(function () use ($user, $request) {
                $user->status = $request->approval_status;
                $user->save();
            });
            
            Mail::to($user->email)->send(new approveApplicationMail($user));
            sweetalert()->addSuccess('Application status changed!');
            return back();
        } catch (\Exception $e) {
            sweetalert()->addError('Some error occurred!');
            return back();
        }
        
        
    }
}