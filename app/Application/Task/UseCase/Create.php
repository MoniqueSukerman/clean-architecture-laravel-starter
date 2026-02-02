<?php

namespace App\Application\Task\UseCase;

use App\Application\Task\Input\CreateInput;
use App\Application\Task\Mapper\AppToDomain;
use App\Application\Task\Mapper\DomainToApp;
use App\Application\Task\Output\CreateOutput;
use App\Domain\Repository\Task\TaskRepository;

class Create
{
    public function __construct(
        private readonly TaskRepository $taskRepository, //Interface - o Mapeamento para a classe concreta é feito em app/Providers/AppServiceProvider.php
        private readonly AppToDomain    $appToDomain,
        private readonly DomainToApp    $domainToApp,
    )
    {
    }

    public function execute(CreateInput $input): CreateOutput
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
