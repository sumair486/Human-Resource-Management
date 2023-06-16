<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with() function with client model
        // $projects = Project::with('client')->get();
        $projects = Project::all();
        return view('project.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = DB::table('clients')->select('id', 'full_name')->get();

        return view('project.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'service' => 'required',
            'project_type' => 'required'
        ]);

        $project = new Project;

        $project->client_id = $request->client_id;
        $project->title = $request->title;
        $project->project_type = $request->project_type;
        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->technology = $request->technology;
        $project->website = $request->website;
        $project->service = $request->service;
        $project->note = $request->note;

        $project->save();

        return redirect('project/create')->with('success', 'Record has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = DB::table('clients')->select('id', 'full_name')->get();
        $project = Project::find($id);
        return view('project.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'service' => 'required',
        ]);

        $project = Project::find($id);

        $project->client_id = $request->client_id;
        $project->title = $request->title;
        $project->project_type = $request->project_type;
        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->technology = $request->technology;
        $project->website = $request->website;
        $project->service = $request->service;
        $project->note = $request->note;

        $project->save();

        return redirect()->back()->with('update', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect('project');
    }
}
