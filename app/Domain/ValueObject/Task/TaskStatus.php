<?php

namespace App\Domain\ValueObject\Task;

enum TaskStatus : string
{
    case PENDENTE = 'pendente';
    case EM_ANDAMENTO = 'em_andamento';
    case CONCLUIDO = 'concluido';
}
