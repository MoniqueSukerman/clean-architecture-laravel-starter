<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\DTO\CreateInput;
use App\Application\Task\DTO\CreateOutput;
use App\Application\Task\Mapper\AppToDomain;
use App\Application\Task\Mapper\DomainToApp;
use App\Domain\Repository\Task\TaskRepository;

class Create
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly AppToDomain    $appToDomain,
        private readonly DomainToApp    $domainToApp,
    )
    {
    }

    public function execute(CreateInput $input): CreateOutput
    {
        $domainTask = $this->appToDomain->createInputToTaskDomain($input);


        $createdTask = $this->taskRepository->create($domainTask);

        return $this->domainToApp->taskDomainToCreateOutput($createdTask);
    }
}
