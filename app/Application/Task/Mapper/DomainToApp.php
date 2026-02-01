<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\DTO\CreateOutput;
use App\Domain\Entity\Task\Task;

class DomainToApp
{
    public function taskDomainToCreateOutput(Task $task) : CreateOutput
    {
        return new CreateOutput(
            $task->id,
            $task->title,
            $task->description,
            $task->status,
        );
    }

}
