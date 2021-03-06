<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Project::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('projects.index')->with('proyectos', $proyectos);
    }

    /*public function filtro(Request $request){
        $proyectos = Project::where('user_id', Auth::user()->id)
        ->where('hex', $request->hex)
        ->get();
    }*/

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = Project::create([
            'user_id' => Auth::user()->id ,
            'name' => $request->name ,
            'description' => $request->description ,
            'final_date' => $request->final_date,
            'hex' => $request->hex,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Project::find($id);

        return view('project.show')->with('proyecto', $proyecto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Project::find($id);

        return view('project.edit')->with('proyecto', $proyecto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Project::find($id);

        $proyecto->update([
            'user_id' => Auth::user()->id ,
            'name' => $request->name ,
            'description' => $request->description ,
            'final_date' => $request->final_date,
            'hex' => $request->hex,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Project::find($id);
        $proyecto->delete();

        return redirect()->route('projects.index');
    }
}
