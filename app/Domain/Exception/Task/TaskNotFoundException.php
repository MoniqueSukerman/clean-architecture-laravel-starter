<?php

namespace App\Domain\Exception\Task;

use App\Domain\Exception\Http\NotFoundException;

class TaskNotFoundException extends NotFoundException
{
    public function __construct(string $id)
    {
        parent::__construct('Tarefa não encontrada: ' . $id);
    }

}
