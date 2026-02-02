<?php

namespace App\Infrastructure\Http\Controllers\Task;

use App\Application\Task\UseCase\Delete;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteController
{
    public function __construct(
        private readonly Delete $deleteUseCase,
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
