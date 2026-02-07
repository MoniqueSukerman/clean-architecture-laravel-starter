<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\FindTaskOutput;
use App\Domain\Repository\Task\TaskRepository;

class DeleteTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
    )
    {
    }

    public function execute(string $id) : void
    {
        $this->taskRepository->delete($id);
    }
}
