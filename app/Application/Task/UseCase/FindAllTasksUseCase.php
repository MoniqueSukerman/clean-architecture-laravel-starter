<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\FindAllTasksOutput;
use App\Domain\Common\Log\LoggerInterface;
use App\Domain\Task\Repository\TaskRepository;

class FindAllTasksUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly DomainToAppMapper $domainToApp,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function execute() : FindAllTasksOutput
    {
        $this->logger->info('Listando todas as tarefas');
        $domainTasks = $this->taskRepository->all();

        return $this->domainToApp->taskDomainToFindAllOutput($domainTasks);
    }
}
