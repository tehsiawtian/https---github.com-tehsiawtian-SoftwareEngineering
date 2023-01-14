<?php

namespace App\Http\Controllers;

use App\Models\SettingDepartment;
use Illuminate\Http\Request;

class SettingDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aba');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        SettingDepartment::create([
            '' => '',
            '' => '',
            '' => '',
        ]);
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
     * @param  \App\Models\SettingDepartment  $settingDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(SettingDepartment $settingDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SettingDepartment  $settingDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(SettingDepartment $settingDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SettingDepartment  $settingDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingDepartment $settingDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SettingDepartment  $settingDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettingDepartment $settingDepartment)
    {
        //
    }
}
