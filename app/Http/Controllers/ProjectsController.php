<?php

namespace App\Http\Controllers;
use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {

            $TenUser = Auth::user()->name;
            if ($TenUser == 'admin') {
                $projects = Project::all();
            } else {
                $projects = Project::where('user_id', Auth::user()->id)->get();
            }

            return view('projects.index', ['projects' => $projects]);
        }
        return view('auth.login');

        /* if( Auth::check() ){
    $projects = Project::all();
    return View('projects.index', ['projects' => $projects]);
    }
    return view('auth.login');*/
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
           
            return View('Projects.create');
        }
        return view('auth.login');
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
        if(Auth::check()){
            $project = Project::create([
                'Name' => $request->input('Name'),
                'Description' => $request->input('Description'),
                'Company_ID' => $request->input('company_id'),
                'User_ID' => Auth::user()->id
            ]);


            if($project){
                return redirect()->route('Projects.index', ['project'=> $project->id])
                ->with('success' , 'project created successfully');
            }

        }
        
            return back()->withInput()->with('errors', 'Error creating new project');



            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        DB::table("Projects")->delete($id);
        return redirect()->route('Projects.index')
        ->with('success', 'Projects deleted successfully');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("Projects")->whereIn('id',explode(",",$ids))->delete();
        return redirect()->route('Projects.index')
        ->with('success', 'Projects deleted successfully');
    }

    public function deleteItem(Request $req)
    {
        dd($req);
        Project::find($req->id)->delete();

        return response()->json();

     
    }

    public function readItems(Request $req)
    {
        $data = Project::all();

        return view('projects.index', ['projects' => $data])->withData($data);
       /* if (Auth::check()) {
            
                        $TenUser = Auth::user()->name;
                        if ($TenUser == 'admin') {
                            $projects = Project::all();
                        } else {
                            $projects = Project::where('user_id', Auth::user()->id)->get();
                        }
            
                        return view('projects.index', ['projects' => $projects])->withData($projects);
                    }
                    return view('auth.login');*/
    }

    public function editItem(Request $req)
    {
        dd($req);
        $data = Project::find($req->id);
        $data->Name = $req->name;
        $data->save();

        return response()->json($data);
    }
}
