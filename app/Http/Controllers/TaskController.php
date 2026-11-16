<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); //ambik data dari database simpan dalam $tasks melalui model.
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

        Task::create($validated); //hanta that data ke model dan simpan data ke database melalui model.

        return redirect()->route('tasks.create')
            ->with('success', 'Task successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //receive data lama dari edit yg nak diedit dan tunjuk dalm form 
    {
        $task = Task::findOrFail($id); // ambik data yg nak diedit dari database melalui model. than store dlm $tasks
        return view('tasks.edit', compact('task')); //compact akan hanta data lama, dan sent ke  view edit.blade.
    }

    /**
     * Update the specified resource in storage.
     */
    //ambik data baru dan update dalam database
    public function update(Request $request, string $id) //terima post dari form edit.blade.php
    {
        $validated = $request->validate([ //check condition data okay ke tak.
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'priority' => 'required',
            'status' => 'required',
        ]);

        $task = Task::findOrFail($id); //cari data dalam database melalui model mengguna id.
        $task->update($validated);// update data baru dalam database.

        return redirect()->route('tasks.index')
            ->with('success', 'Task successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)// receive task nk didelete dari index
    {
        $task = Task::findOrFail($id); // cari id tu dalam database
        $task->delete(); //delete dan update database
        
        return redirect()->route('tasks.index')
            ->with('success', 'Task successfully deleted!');
    }
}
