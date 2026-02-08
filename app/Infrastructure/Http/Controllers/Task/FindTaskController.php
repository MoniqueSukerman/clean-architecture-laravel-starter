<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\FindTaskUseCase;
use App\Domain\Log\LoggerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindTaskController
{
    public function __construct(
        private readonly FindTaskUseCase $findUseCase,
        private readonly LoggerInterface $logger,
    )
    {}
    public function __invoke(Request $request) : JsonResponse
    {
            $id = $request->route('id');
            $output = $this->findUseCase->execute($id);

            $this->logger->info('Tarefa encontrada com sucesso');

            return response()->json([
                'id' => $output->id,
                'title' => $output->title,
                'description' => $output->description,
                'status' => $output->status,
            ]);
    }
}
