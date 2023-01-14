<?php

use App\Models\StudentCase;
use App\Models\SettingStatus;
use App\Models\SettingComplaint;
use App\Models\SettingDepartment;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentCaseController;
use App\Http\Controllers\SettingComplaintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $departments = [
        'IT',
        'HR',
        'ACC',
        'Admin',
        'Spam',
    ];

    $complaints = [
        'Cleaning',
        'Service',
        'Misconduct',
        'Over-charging',
        'Others',
    ];

    $statuses = [
        'Ongoing',
        'Link',
        'Closed',
        'Solved',
        'Open',
    ];

    $roles = [
        'student',
        'helpdesk',
        'staff',
        'admin'
    ];
    
    foreach($departments as $department){
        SettingDepartment::updateOrCreate([
            'department_name' => $department
        ]);
    }

    foreach($complaints as $complaint){
        SettingComplaint::updateOrCreate([
            'complaint_name' => $complaint
        ]);
    }

    foreach($statuses as $status){
        SettingStatus::updateOrCreate([
            'status_name' => $status
        ]);
    }

    foreach($roles as $role){
        Role::updateOrCreate([
            'name' => $role,
        ]);
    }
    
    return view('login');
});

Auth::routes();

Route::get('Login', [App\Http\Controllers\HomeController::class, 'index'])->name('Login');
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::match(['get', 'post'], 'helpdesk', [StudentCaseController::class, 'helpDesk'])->name('helpdesk');
Route::match(['get', 'post'], 'editHelpdesk/{id}', [StudentCaseController::class, 'editHelpDesk'])->name('editHelpdesk');
Route::get('case_upload', [App\Http\Controllers\HomeController::class, 'caseUpload'])->name('case_upload');
Route::get('notify', [App\Http\Controllers\HomeController::class, 'notification'])->name('notification');
Route::match(['get', 'post'], 'StudentCaseReport', [HomeController::class, 'StudentCaseReport'])->name('StudentCaseReport');
Route::match(['get', 'post'], 'admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin-dashboard');
Route::match(['get', 'post'], 'admin-edit/{id}', [HomeController::class, 'adminEdit'])->name('admin-edit');

//run http://report_web.test/setting to get data
Route::get('setting', [SettingComplaintController::class, 'setting'])->name('setting');
