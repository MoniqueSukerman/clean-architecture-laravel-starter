<?php

namespace App\Domain\Exception\Task;

class TaskNotFoundException extends TaskException
{
    public function __construct(string $id)
    {
        parent::__construct('Tarefa não encontrada: ' . $id);
    }

}
