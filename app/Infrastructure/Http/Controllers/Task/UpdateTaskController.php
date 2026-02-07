<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\Input\UpdateTaskInput;
use App\Application\Task\UseCase\UpdateTaskUseCase;
use App\Infrastructure\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateTaskController
{
    public function __construct(
        private readonly UpdateTaskUseCase $updateUseCase
    )
    {
    }

    public function __invoke(UpdateTaskRequest $request) : JsonResponse
    {
            $task = new UpdateTaskInput(
                $request->route('id'),
                $request->validated('title'),
                $request->validated('description'),
                $request->validated('status'),
            );

            $updatedTask = $this->updateUseCase->execute($task);

            return response()->json([
                'id' => $updatedTask->id,
                'title' => $updatedTask->title,
                'description' => $updatedTask->description,
                'status' => $updatedTask->status,
            ]);
    }
}
