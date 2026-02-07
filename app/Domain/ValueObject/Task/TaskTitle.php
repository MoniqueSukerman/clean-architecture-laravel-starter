<?php

namespace App\Domain\ValueObject\Task;

readonly class TaskTitle : string
{
    public function __construct(
        public string $title,
    ) {
        if (empty(trim($title))) {
            throw new \InvalidArgumentException('O título não pode ser vazio');
        }

        if (strlen($title) > 55) {
            throw new \InvalidArgumentException('O título deve ter no máximo 55 caracteres');
        }
    }
}
