<?php

namespace App\Domain\Task\ValueObject;

enum TaskStatus : string
{
    case PENDENTE = 'pendente';
    case EM_ANDAMENTO = 'em_andamento';
    case CONCLUIDO = 'concluido';
}
