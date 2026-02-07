<?php

namespace App\Application\Task\Mapper;

use App\Application\Task\Output\CreateTaskOutput;
use App\Application\Task\Output\FindAllTasksOutput;
use App\Application\Task\Output\FindTaskOutput;
use App\Application\Task\Output\UpdateTaskOutput;
use App\Domain\Entity\Task\Task;

class DomainToAppMapper
{
    public function taskDomainToCreateOutput(Task $task) : CreateTaskOutput
    {
        return new CreateTaskOutput(
            $task->id,
            $task->title->value,
            $task->description,
            $task->status->value,
        );
    }

    public function taskDomainToUpdateOutput(Task $task) : UpdateTaskOutput
    {
        return new UpdateTaskOutput(
            $task->id,
            $task->title->value,
            $task->description,
            $task->status->value,
        );
    }

    public function taskDomainToFindOutput(Task $task) : FindTaskOutput
    {
        return new FindTaskOutput(
            $task->id,
            $task->title->value,
            $task->description,
            $task->status->value,
        );
    }

    /**
     * @param Task[] $tasks
     */
    public function taskDomainToFindAllOutput(array $tasks) : FindAllTasksOutput
    {
        return new FindAllTasksOutput(
            array_map(function (Task $task) {
                return $this->taskDomainToFindOutput($task);
            }, $tasks)
        );
    }



}
