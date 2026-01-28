<?php

namespace App\Domain\Entity\Task;

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
