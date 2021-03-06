<?php

namespace App\Http\Controllers;

use App\ProjectUser;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ProjectUser=ProjectUser::all();
        return View('ProjectUser.index',['ProjectUser'=>$ProjectUser]);
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
     * @param  \App\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectUser $projectUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectUser $projectUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectUser $projectUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectUser $projectUser)
    {
        //
    }
}
