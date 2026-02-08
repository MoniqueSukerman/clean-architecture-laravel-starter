<?php

namespace App\Domain\Task\Exception;

use App\Domain\Common\Exception\Http\NotFoundException;

class TaskNotFoundException extends NotFoundException
{
    public function __construct(string $id)
    {
        parent::__construct('Tarefa não encontrada: ' . $id);
    }

}
