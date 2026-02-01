<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\DTO\CreateInput;
use App\Domain\Entity\Task\Task;

class AppToDomain
{
    public function createInputToTaskDomain(CreateInput $createInput) : Task
    {
     return new Task(
            $createInput->title,
            $createInput->description,
            $createInput->status,
        );
    }

}
