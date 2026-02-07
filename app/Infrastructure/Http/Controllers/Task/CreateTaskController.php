<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\UseCase\CreateTaskUseCase;
use App\Infrastructure\Http\Requests\Task\CreateTaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateTaskController
{
    public function __construct(
        private readonly CreateTaskUseCase $createUseCase
    )
    {}
    public function __invoke(CreateTaskRequest $request) : JsonResponse
    {
            /**
             * Cria um DTO com os dados vindos da requisição para passar para a camada de aplicação
             */
            $input = new CreateTaskInput(
                $request->validated('title'),
                $request->validated('description'),
                $request->validated('status'),
            );

            /**
             * Executa o caso de uso de criação de tarefa, que retorna um DTO com os dados da tarefa criada
             */
            $output = $this->createUseCase->execute($input);

            return response()->json([
                'id' => $output->id,
                'title' => $output->title,
                'description' => $output->description,
                'status' => $output->status,
            ], 201);
    }
}
