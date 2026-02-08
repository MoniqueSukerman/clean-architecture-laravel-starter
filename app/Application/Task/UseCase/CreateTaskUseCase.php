<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\Mapper\AppToDomainMapper;
use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\CreateTaskOutput;
use App\Domain\Common\Exception\Http\BadRequestException;
use App\Domain\Common\Log\LoggerInterface;
use App\Domain\Task\Repository\TaskRepository;

class CreateTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository, //Interface - o Mapeamento para a classe concreta é feito em app/Providers/AppServiceProvider.php
        private readonly AppToDomainMapper $appToDomain,
        private readonly DomainToAppMapper $domainToApp,
        private readonly LoggerInterface $logger,
    )
    {
    }

    /**
     * @throws BadRequestException
     */
    public function execute(CreateTaskInput $input): CreateTaskOutput
    {
        $this->logger->info('Criando tarefa');
        $domainTask = $this->appToDomain->createInputToTaskDomain($input);
        $createdTask = $this->taskRepository->create($domainTask);

        return $this->domainToApp->taskDomainToCreateOutput($createdTask);
    }
}
