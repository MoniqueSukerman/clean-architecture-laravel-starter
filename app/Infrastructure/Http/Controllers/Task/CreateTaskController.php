<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\UseCase\CreateTaskUseCase;
use App\Domain\Common\Exception\Http\BadRequestException;
use App\Domain\Common\Log\LoggerInterface;
use App\Infrastructure\Http\Requests\Task\CreateTaskRequest;
use Illuminate\Http\JsonResponse;

class CreateTaskController
{
    public function __construct(
        private readonly CreateTaskUseCase $createUseCase,
        private readonly LoggerInterface $logger,
    )
    {}

    /**
     * @throws BadRequestException
     */
    public function __invoke(CreateTaskRequest $request) : JsonResponse
    {
            $input = new CreateTaskInput(
                $request->validated('title'),
                $request->validated('description'),
                $request->validated('status'),
            );

            $output = $this->createUseCase->execute($input);

            $this->logger->info('Tarefa criada com sucesso');

            return response()->json([
                'id' => $output->id,
                'title' => $output->title,
                'description' => $output->description,
                'status' => $output->status,
            ], 201);
    }
}
