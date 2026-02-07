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
                $request->input('title'),
                $request->input('description'),
                $request->input('status'),
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
