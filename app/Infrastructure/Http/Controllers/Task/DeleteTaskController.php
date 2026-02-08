<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\DeleteTaskUseCase;
use App\Domain\Common\Log\LoggerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteTaskController
{
    public function __construct(
        private readonly DeleteTaskUseCase $deleteUseCase,
        private readonly LoggerInterface $logger,
    )
    {}
    public function __invoke(Request $request) : JsonResponse|Response
    {
            $id = $request->route('id');

            $this->deleteUseCase->execute($id);
            $this->logger->info('Tarefa deletada com sucesso');

            return response()->noContent();
    }
}
