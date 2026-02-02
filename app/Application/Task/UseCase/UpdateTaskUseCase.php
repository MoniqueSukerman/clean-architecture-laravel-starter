<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\UpdateTaskInput;
use App\Application\Task\Mapper\AppToDomainMapper;
use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\UpdateTaskOutput;
use App\Domain\Repository\Task\TaskRepository;

class UpdateTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly AppToDomainMapper $appToDomain,
        private readonly DomainToAppMapper $domainToApp,
    )
    {
    }

    public function execute(UpdateTaskInput $input): UpdateTaskOutput
    {
        $domainTask = $this->appToDomain->updateInputToTaskDomain($input);
        $task = $this->taskRepository->update($domainTask);

        return $this->domainToApp->taskDomainToUpdateOutput($task);
    }
}
