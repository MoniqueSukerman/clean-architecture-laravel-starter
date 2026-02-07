<?php

namespace App\Infrastructure\Eloquent\Repository;

use App\Domain\Exception\Task\TaskNotFoundException;
use App\Domain\Repository\Task\TaskRepository;
use App\Infrastructure\Eloquent\Model\Task;
use \App\Domain\Entity\Task\Task as DomainTask;
use Illuminate\Support\Facades\Log;

class TaskEloquentRepository implements TaskRepository
{
    /**
     * Recebe uma entidade de domínio e retorna uma entidade de domínio. Porque a camada de aplicação não conhece Eloquent
     */
    public function create(DomainTask $task): DomainTask
    {
        Log::debug('TaskEloquentRepository::create - Iniciando criação de tarefa', [
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
        ]);

        $eloquentTask = Task::create([
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
        ]);

        Log::debug('TaskEloquentRepository::create - Tarefa criada com sucesso', [
            'id' => $eloquentTask->id,
        ]);

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    public function update(DomainTask $task): DomainTask
    {
        Log::debug('TaskEloquentRepository::update - Iniciando atualização de tarefa', [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
        ]);

        $eloquentTask = Task::find($task->id);

        Log::debug('TaskEloquentRepository::update - Resultado do find', [
            'found' => $eloquentTask !== null,
            'eloquentTask' => $eloquentTask,
        ]);

        $eloquentTask->title = $task->title;
        $eloquentTask->description = $task->description;
        $eloquentTask->status = $task->status;
        $eloquentTask->save();

        Log::debug('TaskEloquentRepository::update - Tarefa atualizada com sucesso');

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    /**
     * @throws TaskNotFoundException
     */
    public function delete(string $id): void
    {
        Log::debug('TaskEloquentRepository::delete - Iniciando exclusão de tarefa', [
            'id' => $id,
        ]);

        $eloquentTask = Task::find($id);

        Log::debug('TaskEloquentRepository::delete - Resultado do find', [
            'found' => $eloquentTask !== null,
            'eloquentTask' => $eloquentTask,
            'instanceof_check' => $eloquentTask instanceof Task,
        ]);

        if (!$eloquentTask instanceof Task) {
            Log::warning('TaskEloquentRepository::delete - Tarefa não encontrada, lançando exceção', [
                'id' => $id,
            ]);
            throw new TaskNotFoundException($id);
        }

        Task::destroy($id);

        Log::debug('TaskEloquentRepository::delete - Tarefa excluída com sucesso', [
            'id' => $id,
        ]);
    }

    public function find(string $id): DomainTask
    {
        Log::debug('TaskEloquentRepository::find - Iniciando busca de tarefa', [
            'id' => $id,
        ]);

        $eloquentTask = Task::find($id);

        Log::debug('TaskEloquentRepository::find - Resultado do find', [
            'found' => $eloquentTask !== null,
            'eloquentTask' => $eloquentTask,
        ]);

        return new DomainTask($eloquentTask->title, $eloquentTask->description, $eloquentTask->status, $eloquentTask->id);
    }

    /**
     * @return DomainTask[]
     */
    public function all(): array
    {
        Log::debug('TaskEloquentRepository::all - Iniciando busca de todas as tarefas');

        $eloquentTasks = Task::all()->toArray();

        Log::debug('TaskEloquentRepository::all - Tarefas encontradas', [
            'count' => count($eloquentTasks),
        ]);

        return array_map(function ($task) {
            return new DomainTask($task['title'], $task['description'], $task['status'], $task['id']);
        }, $eloquentTasks);
    }
}
