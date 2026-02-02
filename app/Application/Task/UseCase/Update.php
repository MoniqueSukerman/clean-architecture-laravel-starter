<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\UpdateInput;
use App\Application\Task\Mapper\AppToDomain;
use App\Application\Task\Mapper\DomainToApp;
use App\Application\Task\Output\UpdateOutput;
use App\Domain\Repository\Task\TaskRepository;

class Update
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly AppToDomain    $appToDomain,
        private readonly DomainToApp    $domainToApp,
    )
    {
    }

    public function execute(UpdateInput $input): UpdateOutput
    {
        $domainTask = $this->appToDomain->updateInputToTaskDomain($input);
        $task = $this->taskRepository->update($domainTask);

        return $this->domainToApp->taskDomainToUpdateOutput($task);
    }
}
