<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\Mapper\AppToDomainMapper;
use App\Application\Task\Mapper\DomainToAppMapper;
use App\Application\Task\Output\CreateTaskOutput;
use App\Domain\Repository\Task\TaskRepository;

class CreateTaskUseCase
{
    public function __construct(
        private readonly TaskRepository    $taskRepository, //Interface - o Mapeamento para a classe concreta é feito em app/Providers/AppServiceProvider.php
        private readonly AppToDomainMapper $appToDomain,
        private readonly DomainToAppMapper $domainToApp,
    )
    {
    }

    public function execute(CreateTaskInput $input): CreateTaskOutput
    {
        /**
         * Mapeia o DTO de entrada para uma entidade de domínio
         */
        $domainTask = $this->appToDomain->createInputToTaskDomain($input);
        /**
         * Passa a entidade de domínio para o repositório, que retorna uma entidade de domínio
         */
        $createdTask = $this->taskRepository->create($domainTask);

        /**
         * Mapeia a entidade de domínio para o DTO de saída
         */
        return $this->domainToApp->taskDomainToCreateOutput($createdTask);
    }
}
