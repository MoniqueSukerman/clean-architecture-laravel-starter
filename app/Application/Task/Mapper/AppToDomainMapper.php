<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\Input\CreateTaskInput;
use App\Application\Task\Input\UpdateTaskInput;
use App\Domain\Common\Exception\Http\BadRequestException;
use App\Domain\Task\Entity\Task;
use App\Domain\Task\ValueObject\TaskStatus;
use App\Domain\Task\ValueObject\TaskTitle;

class AppToDomainMapper
{
    /**
     * @throws BadRequestException
     */
    public function createInputToTaskDomain(CreateTaskInput $createInput) : Task
    {
     return new Task(
            new TaskTitle($createInput->title),
            $createInput->description,
            TaskStatus::from($createInput->status),
        );
    }

    /**
     * @throws BadRequestException
     */
    public function updateInputToTaskDomain(UpdateTaskInput $updateInput) : Task
    {
        return new Task(
            new TaskTitle($updateInput->title),
            $updateInput->description,
            TaskStatus::from($updateInput->status),
            $updateInput->id,
        );
    }

}
