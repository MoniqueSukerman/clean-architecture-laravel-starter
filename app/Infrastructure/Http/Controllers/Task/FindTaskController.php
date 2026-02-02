<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\FindTaskUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FindTaskController
{
    public function __construct(
        private readonly FindTaskUseCase $findUseCase,
    )
    {}
    public function __invoke(Request $request) : JsonResponse
    {
        try {
            $id = $request->route('id');
            $output = $this->findUseCase->execute($id);

            return response()->json([
                'id' => $output->id,
                'title' => $output->title,
                'description' => $output->description,
                'status' => $output->status,
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
