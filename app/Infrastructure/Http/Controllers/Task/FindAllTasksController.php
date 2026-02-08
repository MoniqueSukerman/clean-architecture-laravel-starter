<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\FindAllTasksUseCase;
use App\Domain\Log\LoggerInterface;
use Illuminate\Http\JsonResponse;

class FindAllTasksController
{
    public function __construct(
        private readonly FindAllTasksUseCase $findAllUseCase,
        private readonly LoggerInterface $logger,
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

            $this->logger->info('Todas as tarefas foram listadas com sucesso');

            return response()->json($tasks);
    }
}
