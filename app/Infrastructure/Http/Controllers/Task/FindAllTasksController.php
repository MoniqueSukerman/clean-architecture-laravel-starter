<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\FindAllTasksUseCase;
use Illuminate\Http\JsonResponse;

class FindAllTasksController
{
    public function __construct(
        private readonly FindAllTasksUseCase $findAllUseCase,
    )
    {}
    public function __invoke() : JsonResponse
    {
            $output = $this->findAllUseCase->execute();

            $tasks = array_map(function ($task) {
                return [
                    'id' => $task->id,
                    'title' => $task->title,
                    'description' => $task->description,
                    'status' => $task->status,
                ];
            }, $output->tasks);

            return response()->json($tasks);
    }
}
