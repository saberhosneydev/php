<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // This is handled via HomeController@index
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
        if ($request->taskCompleted == "on") {
            $taskCompleted = 1;
        }else {
            $taskCompleted = 0;
        }
        Task::create([
            'name' => $request->name,
            'completed' => $taskCompleted,
            'board_id' => $request->boardId,
            'priorty' => $request->priorty
        ]);
        return redirect('/home/projects/'.$request->projectId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
        'taskEdit' => 'required|min:5'
        ]);
        $task->update([
            'name' => $request->taskEdit
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
    public function completed(Task $task) {
        if (request()->completed == "on") {
            $completed = 1;
        }else {
            $completed = 0;
        }
        $task->find(request()->taskId)->update([
            'completed' => $completed
        ]);
        return back();
    }
}
