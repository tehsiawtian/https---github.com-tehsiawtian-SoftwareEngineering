<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\StudentCase;
use Illuminate\Http\Request;
use App\Models\SettingStatus;
use App\Models\SettingComplaint;
use App\Models\SettingDepartment;
use Illuminate\Support\Facades\Log;

class StudentCaseController extends Controller
{

    public function helpDesk(Request $request){
        if($request->isMethod('post')){
            if(@$request->helpdesk_caseid){
                $case = StudentCase::find($request->helpdesk_caseid);
                $case->department_id = $request->department;
                $case->save();

                Notification::create([
                    'notification_comment' => 'Case '.$case->case_id. ' has assigned to Department '.$case->department->department_name,
                    'case_id' => $case->case_id,
                    'user_id' => $case->user_id,
                    'department_id' => $case->department_id,
                ]);
                
            }else if(@$request->staff_caseid){
                $case = StudentCase::find($request->staff_caseid);
                $case->status_id = $request->status;
                $case->update([
                    'status_id' => $request->status,
                    'complaint_comment' => $request->staff_comment,
                    'complaint_remark' => $request->remark,
                ]);
                $case->save();

                Notification::create([
                    'notification_comment' => 'Case '.$case->case_id. ' has been updated by '.auth()->user()->name,
                    'case_id' => $case->case_id,
                    'user_id' => $case->user_id,
                ]);

                if($request->file('staff_file')){
                    $case->addMediaFromRequest('staff_file')->toMediaCollection('staff');
                }
            }else{
                $case = StudentCase::create([
                    'complaint_id' => $request['complaint'],
                    'complaint_desc' => $request['complaint_desc'],
                    'user_id' => auth()->user()->id,
                    'status_id' => 5,
                ]);
                
                if($request->file('student_file')){
                    $case->addMediaFromRequest('student_file')->toMediaCollection('student');
                }

                Notification::create([
                    'notification_comment' => 'Case '.$case->case_id. ' has been created by '.auth()->user()->name,
                    'case_id' => $case->case_id,
                    'user_id' => $case->user_id,
                ]);
            }

            return redirect()->route('home');
        }

        return view('helpdesk',[
            'status' => SettingStatus::getStatus(),
            'complaint' => SettingComplaint::getComplaint(),
            'department' => SettingDepartment::getDepartment(),
        ]);
    }

    public function editHelpDesk(Request $request, $case_id){
        // dd($request);
        $case = StudentCase::find($case_id);

        if($request->isMethod('post')){
            return redirect()->route('home');
        }

        return view('helpdesk',[
            'status' => SettingStatus::getStatus(),
            'complaint' => SettingComplaint::getComplaint(),
            'department' => SettingDepartment::getDepartment(),
            'case' => $case,
            'edit' => '1',
        ]);
    }
}
