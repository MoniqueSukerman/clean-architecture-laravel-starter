<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\FindAllTasksOutput;
use App\Domain\Repository\Task\TaskRepository;

class FindAllTasksUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly DomainToAppMapper $domainToApp,
    )
    {
    }

    public function execute() : FindAllTasksOutput
    {
        $domainTasks = $this->taskRepository->all();

        return $this->domainToApp->taskDomainToFindAllOutput($domainTasks);
    }
}
