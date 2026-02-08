<?php

namespace App\Application\Task\UseCase;

use App\Domain\Common\Log\LoggerInterface;
use App\Domain\Task\Repository\TaskRepository;

class DeleteTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function execute(string $id) : void
    {
        $this->logger->info('Deletando tarefa');
        $this->taskRepository->delete($id);
    }
}
