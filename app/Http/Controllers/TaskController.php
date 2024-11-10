<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Spatie\FlareClient\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();
        return View('tasks.index',['tasks'=>$tasks]);
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
    public function store(Request $request)
    {
       $validatedData=$request->validate([
            'task'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'status'=>'required',
        ]);

        Task::create($validatedData);
        return redirect('/');


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData=$request->validate([
            'task'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'status'=>'required',
        ]);

        $task->update($validatedData);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
