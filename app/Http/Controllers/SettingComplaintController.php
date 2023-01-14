<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SettingStatus;
use App\Models\SettingComplaint;
use App\Models\SettingDepartment;
use App\Models\StudentCase;
use Spatie\Permission\Models\Role;

class SettingComplaintController extends Controller
{
    public function setting(){
        
    }
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SettingComplaint  $settingComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(SettingComplaint $settingComplaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SettingComplaint  $settingComplaint
     * @return \Illuminate\Http\Response
     */
    public function edit(SettingComplaint $settingComplaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SettingComplaint  $settingComplaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingComplaint $settingComplaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SettingComplaint  $settingComplaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettingComplaint $settingComplaint)
    {
        //
    }
}
