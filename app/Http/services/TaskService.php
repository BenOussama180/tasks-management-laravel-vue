<?php

namespace App\Http\Services;

use App\Http\Resources\TasksResource;
use App\Models\Task;

class TaskService
{
    /**
     * Get all tasks
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return TasksResource::collection(Task::latest()->get());
    }

    /**
     * Create a new task
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Task
     */
    public function create(array $data)
    {
        return Task::create($data);
    }

    /**
     * Update a task
     *
     * @param array<string, mixed> $data
     * @param int $id
     * @return \App\Models\Task
     */
    public function update(array $data, Task $task)
    {
        $task->update($data);
        return $task;
    }

    // show a task informations
    public function show(Task $task)
    {
        return new TasksResource($task);
    }
}
