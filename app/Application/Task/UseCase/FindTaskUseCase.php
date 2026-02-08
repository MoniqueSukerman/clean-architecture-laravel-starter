<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\FindTaskOutput;
use App\Domain\Common\Log\LoggerInterface;
use App\Domain\Task\Repository\TaskRepository;

class FindTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository,
        private readonly DomainToAppMapper $domainToApp,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function execute(string $id) : FindTaskOutput
    {
        $this->logger->info('Encontrando tarefa');
        $domainTask = $this->taskRepository->find($id);

        return $this->domainToApp->taskDomainToFindOutput($domainTask);
    }
}
