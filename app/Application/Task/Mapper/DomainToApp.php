<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\Output\CreateOutput;
use App\Application\Task\Output\FindAllOutput;
use App\Application\Task\Output\FindOutput;
use App\Application\Task\Output\UpdateOutput;
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

    public function taskDomainToUpdateOutput(Task $task) : UpdateOutput
    {
        return new UpdateOutput(
            $task->id,
            $task->title,
            $task->description,
            $task->status,
        );
    }

    public function taskDomainToFindOutput(Task $task) : FindOutput
    {
        return new FindOutput(
            $task->id,
            $task->title,
            $task->description,
            $task->status,
        );
    }

    /**
     * @param Task[] $tasks
     */
    public function taskDomainToFindAllOutput(array $tasks) : FindAllOutput
    {
        return new FindAllOutput(
            array_map(function (Task $task) {
                return $this->taskDomainToFindOutput($task);
            }, $tasks)
        );
    }



}
