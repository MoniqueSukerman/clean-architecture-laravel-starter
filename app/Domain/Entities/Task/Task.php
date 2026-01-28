<?php

namespace App\Domain\Entities\Task;

readonly class Task
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }
}
