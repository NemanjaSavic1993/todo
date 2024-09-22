<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        // da ovde u bazi nemam user_id koji jos uvek ne saljem iz forme
        // mogao bih da podatke upisem na drugi nacin, a to je
        // $task->create($validateData)
        // ovaj metod sam radi cuvanje (save), pa bi u tom slucaju linija koda
        // $task->save() bila suvisna, a nameTask u name atributu bi glasio samo name, kao i u validaciji

        $validateData = request()->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status' => ['required', 'in:Waiting,Started,In Proccess,Pause,Finished']
        ]);

        $task = new Task();
        $task->name = request('nameTask');
        $task->description = request('description');
        $task->status = request('status');
        $task->user_id = 1;

        $task->save();

        return redirect('tasks')->with('created', 'Task has been created');


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // $task = Task::where('id', $id)->first(); primer bez bindovanja

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // $task = Task::where('id', $id)->first(); ovo je primer kada se ne radi binding
        return view('tasks.create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task)
    {
        $validateData = request()->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status' => ['required', 'in:Waiting,Started,In Proccess,Pause,Finished']
        ]);

        // $task = Task::find($id); primer bez bindovanja

        // da nema user_id u bazi, update bi se radio na sledeci nacin
        // $task->update($validateData);
        // a najbolje je odmah nakon validacije uraditi cuvanje
        // $task->update(request()->validate([
        //     'nameTask' => 'required',
        //     'description' => 'required',
        //     'status' => ['required', 'in:Waiting,Started,In Proccess,Pause,Finished']
        // ]));

        $task->name = request('nameTask');
        $task->description = request('description');
        $task->status = request('status');
        $task->user_id = 1;

        $task->update();

        return redirect('tasks')->with('updated', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // $task = Task::find($id); primer bez bindovanja

        $task->delete();

        return redirect('tasks')->with('deleted', 'Task has been deleted');
    }
}
