<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\DeleteTaskUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteTaskController
{
    public function __construct(
        private readonly DeleteTaskUseCase $deleteUseCase,
    )
    {}
    public function __invoke(Request $request) : JsonResponse|Response
    {
        try {
            $id = $request->route('id');

            $this->deleteUseCase->execute($id);

            return response()->noContent();
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
