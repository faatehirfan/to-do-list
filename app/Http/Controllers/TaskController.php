<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //tunjuk tasks belong to specific user.
        $tasks = $request->user()->tasks()->latest()->get();  //ambik data dari database simpan dalam $tasks melalui model.
        return view('tasks.index', compact('tasks')); //view data kat index.blade pstu sent $tasks guna compact ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view('tasks.create'); //just tolong view page create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //terima post dari form create.blade.php
    {
        $validated = $request->validate([//check condition data okay ke tak.
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'priority' => 'required',
        ]);

         $request->user()->tasks()->create($validated); //hanta that data ke model dan simpan data ke database melalui model.

        return redirect()->route('tasks.create')
            ->with('success', 'Task successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // Enforce policy: only owner can view
        Gate::authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) //receive data lama dari edit yg nak diedit dan tunjuk dalm form 
    {
        // da dibuat oleh model binding $task = Task::findOrFail($id); // ambik data yg nak diedit dari database melalui model. than store dlm $tasks
        // Enforce policy: only owner can edit
        Gate::authorize('update', $task);
        return view('tasks.edit', compact('task')); //compact akan hanta data lama, dan sent ke  view edit.blade.
    }

    /**
     * Update the specified resource in storage.
     */
    //ambik data baru dan update dalam database
    public function update(Request $request, Task $task) //terima post dari form edit.blade.php
    {
        // Enforce policy: only owner can update
        Gate::authorize('update', $task);

        $validated = $request->validate([ //check condition data okay ke tak.
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'priority' => 'required',
            'status' => 'required',
        ]);

        //da dibuat oleh model binding $task = Task::findOrFail($id); //cari data dalam database melalui model mengguna id.
        $task->update($validated);// update data baru dalam database.

        return redirect()->route('tasks.index')
            ->with('success', 'Task successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)// receive task nk didelete dari index
    {
        //$task = Task::findOrFail($id); // cari id tu dalam database
        // Enforce policy: only owner can delete
        Gate::authorize('delete', $task);
        
        $task->delete(); //delete dan update database
        
        return redirect()->route('tasks.index')
            ->with('success', 'Task successfully deleted!');
    }
}
