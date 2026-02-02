<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\Input\CreateInput;
use App\Application\Task\Input\UpdateInput;
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

    public function updateInputToTaskDomain(UpdateInput $updateInput) : Task
    {
        return new Task(
            $updateInput->title,
            $updateInput->description,
            $updateInput->status,
            $updateInput->id,
        );
    }

}
