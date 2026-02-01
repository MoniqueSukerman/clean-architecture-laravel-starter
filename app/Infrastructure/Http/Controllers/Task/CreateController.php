<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\DTO\CreateInput;
use App\Application\Task\UseCase\Create;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateController
{
    public function __construct(
        private readonly Create $createUseCase
    )
    {}
    public function __invoke(Request $request) : JsonResponse
    {
        $input = new CreateInput(
            $request->input('title'),
            $request->input('description'),
            $request->input('status'),
        );

        $output = $this->createUseCase->execute($input);

        return response()->json([
            'id' => $output->id,
            'title' => $output->title,
            'description' => $output->description,
            'status' => $output->status,
        ], 201);
    }
}
