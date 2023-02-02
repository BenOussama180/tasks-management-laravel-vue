<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Services\TaskService;

class TaskController extends Controller
{

    public function __construct(protected TaskService $service)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'Tasks retrieved successfully',
            'tasks' => $this->service->all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task = $this->service->update($request->validated(), $task);
        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task->fresh()
        ], 200);
    }

    // show a task informations
    public function show(Task $task)
    {
        return response()->json([
            'message' => 'Task retrieved successfully',
            'task' => $this->service->show($task)
        ], 200);
    }
}
