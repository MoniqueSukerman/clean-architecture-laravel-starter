<?php

namespace App\Infrastructure\Eloquent\Repository;

use App\Domain\Exception\Task\TaskNotFoundException;
use App\Domain\Repository\Task\TaskRepository;
use App\Infrastructure\Eloquent\Model\Task;
use \App\Domain\Entity\Task\Task as DomainTask;

class TaskEloquentRepository implements TaskRepository
{
    /**
     * Recebe uma entidade de domínio e retorna uma entidade de domínio. Porque a camada de aplicação não conhece Eloquent
     */
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
        $eloquentTask = Task::find($task->id);
        $eloquentTask->title = $task->title;
        $eloquentTask->description = $task->description;
        $eloquentTask->status = $task->status;
        $eloquentTask->save();

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    /**
     * @throws TaskNotFoundException
     */
    public function delete(string $id): void
    {
        $eloquentTask = Task::find($id);

        if (!$eloquentTask instanceof Task) {
            throw new TaskNotFoundException($id);
        }

        Task::destroy($id);
    }

    public function find(string $id): DomainTask
    {
        $eloquentTask = Task::find($id);

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    /**
     * @return DomainTask[]
     */
    public function all(): array
    {
        $eloquentTasks = Task::all()->toArray();

        return array_map(function ($task) {
            return new DomainTask($task['title'], $task['description'], $task['status'], $task['id']);
        }, $eloquentTasks);
    }
}
