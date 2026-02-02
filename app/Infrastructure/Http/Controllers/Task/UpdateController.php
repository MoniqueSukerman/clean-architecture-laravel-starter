<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\Input\UpdateInput;
use App\Application\Task\UseCase\Update;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateController
{
    public function __construct(
        private readonly Update $updateUseCase
    )
    {
    }

    public function __invoke(Request $request) : JsonResponse
    {
        try {
            $task = new UpdateInput(
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
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
