<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToApp;
use App\Application\Task\Output\FindOutput;
use App\Domain\Repository\Task\TaskRepository;

class Find
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly DomainToApp    $domainToApp,
    )
    {
    }

    public function execute(string $id) : FindOutput
    {
        $domainTask = $this->taskRepository->find($id);

        return $this->domainToApp->taskDomainToFindOutput($domainTask);
    }
}
