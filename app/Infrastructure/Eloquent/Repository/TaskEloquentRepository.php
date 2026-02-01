<?php

namespace App\Infrastructure\Eloquent\Repository;

use App\Domain\Repository\Task\TaskRepository;
use App\Infrastructure\Eloquent\Model\Task;
use \App\Domain\Entity\Task\Task as DomainTask;

class TaskEloquentRepository implements TaskRepository
{
    public function create(DomainTask $task): DomainTask
    {
        $eloquentTask = Task::create([
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
        ]);

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    public function update(DomainTask $task): DomainTask
    {
        // TODO: Implement update() method.
    }

    public function delete(DomainTask $task): void
    {
        // TODO: Implement delete() method.
    }

    public function find(string $id): DomainTask
    {
        // TODO: Implement find() method.
    }

    public function all(): array
    {
        // TODO: Implement all() method.
    }
}
