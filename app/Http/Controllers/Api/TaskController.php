<?php

namespace App\Http\Controllers\Api;

use App\Actions\TaskFilterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskIndexRequest;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskIndexRequest $request)
    {
        if ($request['status']) {
            $statusValue = Task::getStatus($request['status']);
            $tasks = Task::where('status', $statusValue)->get();
        }else {
            $tasks = Task::all();
        }

        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $created_task = Task::create($request->validated());

        return new TaskResource($created_task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new TaskResource(Task::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
