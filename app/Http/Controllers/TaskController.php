<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Task;
use App\Models\Project;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //VISTA PRINCIPAL
    //LISTADO DE TAREAS
    public function index()
    {
        //Colección de Tareas
        $tareas = Task::where('user_id', Auth::user()->id)
        ->get();
        $proyectos = Project::where('user_id', Auth::user()->id)
        ->get();

        return view('tasks.index')
        ->with('tareas',$tareas)
        ->with('proyectos',$proyectos);
    }

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
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Modo pro
        $tarea = Task::create([
            'user_id' => Auth::user()->id ,
            'name' => $request->name ,
            'description' => $request->description ,
            'process' => $request->process ,
            'due_date' => $request->due_date ,
            'modality' => $request->modality,
            'project_id' => $request->project_id
        ]);

        /*Modo NOOB
        $tarea = new Task;

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();*/

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    //vista de una sola tarea
    public function show($id)
    {
        $tarea = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if (empty($tarea)) {
            return redirect()-back();
        }else{
             return view('tasks.show')->with('tarea', $tarea);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    //ACTUALIZAR / EDITAR
    public function edit($id)
    {
        $tarea = Task::find($id);

        return view('tasks.edit')->with('tarea', $tarea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Modo noob
        $tarea = Task::find($id);

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();*/

        // Modo pro
        $tarea = Task::find($id);

        $tarea->update([
            'user_id' => Auth::user()->id ,
            'name' => $request->name ,
            'description' => $request->description ,
            'process' => $request->process ,
            'due_date' => $request->due_date ,
            'modality' => $request->modality ,
            'project_id' => $request->project_id
        ]);


        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Task::find($id);

        $tarea->delete();

        return redirect()->route('tareas.index');
    }

    public function changeStatus($id)
    {
        $tarea = Task::find($id);

        //la PC ve de la misma forma false = 0 y true = 1

        if ($tarea->is_completed == false) {
            $tarea->is_completed = true;
        }else{
            $tarea->is_completed = false;
        }
        
        $tarea->save();

        return redirect()->back();
    }
}
