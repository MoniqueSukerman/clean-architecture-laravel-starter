<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\Input\UpdateTaskInput;
use App\Domain\Entity\Task\Task;

class AppToDomainMapper
{
    public function createInputToTaskDomain(CreateTaskInput $createInput) : Task
    {
     return new Task(
            $createInput->title,
            $createInput->description,
            $createInput->status,
        );
    }

    public function updateInputToTaskDomain(UpdateTaskInput $updateInput) : Task
    {
        return new Task(
            $updateInput->title,
            $updateInput->description,
            $updateInput->status,
            $updateInput->id,
        );
    }

}
