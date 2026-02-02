<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\UseCase\CreateTaskUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateTaskController
{
    public function __construct(
        private readonly CreateTaskUseCase $createUseCase
    )
    {}
    public function __invoke(Request $request) : JsonResponse
    {
        try {
            /**
             * Cria um DTO com os dados vindos da requisição para passar para a camada de aplicação
             */
            $input = new CreateTaskInput(
                $request->input('title'),
                $request->input('description'),
                $request->input('status'),
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
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
