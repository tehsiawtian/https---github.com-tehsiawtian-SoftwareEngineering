<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\StudentCase;
use Illuminate\Http\Request;
use App\Models\SettingStatus;
use App\Models\SettingComplaint;
use App\Models\SettingDepartment;
use App\Models\User;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Login');
    }

    public function home()
    {
        if(auth()->user()->hasRole('student')){
            $case = StudentCase::getStudentCase()->where('user_id', auth()->user()->id);
        }
        if(auth()->user()->hasRole('staff')){
            $case = StudentCase::getStudentCase()->where('department_id', auth()->user()->department_id);
        }
        if(auth()->user()->hasRole('helpdesk')){
            $case = StudentCase::getStudentCase();
        }
        if(auth()->user()->hasRole('admin')){
            $case = StudentCase::getStudentCase();
        }

        return view('homepage',[
            'student_case' => $case,
        ]);
    }
    
    public function AdminLogin(){
        return view('AdminLogin');
    }
    public function notification(){
        if(auth()->user()->hasRole('student')){
            $notification = Notification::where('user_id', auth()->user()->id)->get();
        }
        if(auth()->user()->hasRole('staff')){
            $notification = Notification::where('department_id', auth()->user()->department_id)->get();
        }
        if(auth()->user()->hasRole('helpdesk')){
            $notification = Notification::all();
        }
        if(auth()->user()->hasRole('admin')){
            $notification = Notification::all();
        }

        return view('notify',[
            'notifications' => $notification,
        ]);
    }
    
    public function adminDashboard(Request $request){
        return view('AdminDashboard',[
            'users' => User::all(),
        ]);
    }
    public function adminEdit(Request $request, $id){
        if($request->isMethod('post')){
            $user = User::find($id);
            if(@$request->role){
                $user->department_id = $request->department;
                $user->save();
                $user->syncRoles($request->role);
            }
            return redirect()->route('admin-dashboard');
        }
        return view('AdminEdit',[
            'user' => User::find($id),
            'roles' => Role::all(),
            'departments' => SettingDepartment::getDepartment(),
        ]);
    }

    public function caseUpload(){
        return view('caseupload');
    }
    public function StudentCaseReport(Request $request){
        $student_case = StudentCase::getStudentCase();

        if ($request->isMethod('post')) {
            StudentCase::create([
                'complaint_id' => $request->type,
                'complaint_desc' => $request->comments,
                'department_id' => 1,
                'status_id' => 5,
            ]);
        }
        return view('StudentCaseReport', [
            'complaints' => SettingComplaint::getComplaint(),
        ]);
    }
}