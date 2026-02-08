<?php

namespace App\Domain\Task\Entity;

use App\Domain\Task\ValueObject\TaskStatus;
use App\Domain\Task\ValueObject\TaskTitle;

readonly class Task
{
    public function __construct(
        public TaskTitle $title,
        public string $description,
        public TaskStatus $status,
        public ?string $id = null,
    ) {
    }
}
