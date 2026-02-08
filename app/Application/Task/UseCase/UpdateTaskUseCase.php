<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\UpdateTaskInput;
use App\Application\Task\Mapper\AppToDomainMapper;
use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\UpdateTaskOutput;
use App\Domain\Log\LoggerInterface;
use App\Domain\Repository\Task\TaskRepository;

class UpdateTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly AppToDomainMapper $appToDomain,
        private readonly DomainToAppMapper $domainToApp,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function execute(UpdateTaskInput $input): UpdateTaskOutput
    {
        $this->logger->info('Atualizando tarefa');
        $domainTask = $this->appToDomain->updateInputToTaskDomain($input);
        $task = $this->taskRepository->update($domainTask);

        return $this->domainToApp->taskDomainToUpdateOutput($task);
    }
}
