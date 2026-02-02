<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToApp;
use App\Application\Task\Output\FindAllOutput;
use App\Domain\Repository\Task\TaskRepository;

class FindAll
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly DomainToApp    $domainToApp,
    )
    {
    }

    public function execute() : FindAllOutput
    {
        $domainTasks = $this->taskRepository->all();

        return $this->domainToApp->taskDomainToFindAllOutput($domainTasks);
    }
}
