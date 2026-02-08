<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\FindTaskOutput;
use App\Domain\Log\LoggerInterface;
use App\Domain\Repository\Task\TaskRepository;

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
