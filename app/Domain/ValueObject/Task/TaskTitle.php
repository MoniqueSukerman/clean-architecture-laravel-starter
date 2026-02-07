<?php

namespace App\Domain\ValueObject\Task;

use App\Domain\Exception\Http\BadRequestException;

readonly class TaskTitle
{
    /**
     * @throws BadRequestException
     */
    public function __construct(
        public string $value,
    ) {
        if (empty(trim($value))) {
            throw new BadRequestException('O título não pode ser vazio');
        }

        if (strlen($value) > 55) {
            throw new BadRequestException('O título deve ter no máximo 55 caracteres');
        }
    }
}
