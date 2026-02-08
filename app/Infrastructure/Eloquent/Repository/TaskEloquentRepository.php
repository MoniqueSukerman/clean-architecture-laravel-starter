<?php

namespace App\Infrastructure\Eloquent\Repository;

use App\Domain\Exception\Http\BadRequestException;
use App\Domain\Exception\Http\InternalServerErrorException;
use App\Domain\Exception\Task\TaskNotFoundException;
use App\Domain\Repository\Task\TaskRepository;
use App\Domain\ValueObject\Task\TaskStatus;
use App\Infrastructure\Eloquent\Model\Task;
use \App\Domain\Entity\Task\Task as DomainTask;
use App\Domain\ValueObject\Task\TaskTitle;
use Illuminate\Database\QueryException;

class TaskEloquentRepository implements TaskRepository
{
    /**
     * Recebe uma entidade de domínio e retorna uma entidade de domínio. Porque a camada de aplicação não conhece Eloquent
     * @throws BadRequestException
     * @throws InternalServerErrorException
     */
    public function create(DomainTask $task): DomainTask
    {
        try {
        $eloquentTask = Task::create([
            'title' => $task->title->value,
            'description' => $task->description,
            'status' => $task->status->value,
        ]);
        } catch (QueryException $e) {
            throw new InternalServerErrorException('Erro ao criar tarefa');
        }

        return new DomainTask(new TaskTitle($eloquentTask->title), $eloquentTask->description, TaskStatus::from($eloquentTask->status), $eloquentTask->id);
    }

    /**
     * @throws TaskNotFoundException
     * @throws BadRequestException
     * @throws InternalServerErrorException
     */
    public function update(DomainTask $task): DomainTask
    {
        $eloquentTask = Task::find($task->id);

        if (!$eloquentTask instanceof Task) {
            throw new TaskNotFoundException($task->id);
        }

        $eloquentTask->title = $task->title->value;
        $eloquentTask->description = $task->description;
        $eloquentTask->status = $task->status->value;

        try {
            $eloquentTask->save();
        } catch (QueryException $e) {
            throw new InternalServerErrorException('Erro ao atualizar tarefa');
        }

        return new DomainTask(new TaskTitle($eloquentTask->title), $eloquentTask->description, TaskStatus::from($eloquentTask->status), $eloquentTask->id);
    }

    /**
     * @throws TaskNotFoundException
     * @throws InternalServerErrorException
     */
    public function delete(string $id): void
    {
        $eloquentTask = Task::find($id);

        if (!$eloquentTask instanceof Task) {
            throw new TaskNotFoundException($id);
        }

        try {
            Task::destroy($id);
        } catch (QueryException $e) {
            throw new InternalServerErrorException('Erro ao deletar tarefa');
        }
    }

    /**
     * @throws TaskNotFoundException
     * @throws BadRequestException
     */
    public function find(string $id): DomainTask
    {
        $eloquentTask = Task::find($id);

        if (!$eloquentTask instanceof Task) {
            throw new TaskNotFoundException($id);
        }

        return new DomainTask(new TaskTitle($eloquentTask->title), $eloquentTask->description, TaskStatus::from($eloquentTask->status), $eloquentTask->id);
    }

    /**
     * @return DomainTask[]
     * @throws BadRequestException
     */
    public function all(): array
    {
        $eloquentTasks = Task::all()->toArray();

        return array_map(function ($task) {
            return new DomainTask(new TaskTitle($task['title']), $task['description'], TaskStatus::from($task['status']), $task['id']);
        }, $eloquentTasks);
    }
}
