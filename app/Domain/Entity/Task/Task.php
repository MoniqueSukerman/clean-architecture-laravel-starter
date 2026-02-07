<?php

namespace App\Domain\Entity\Task;

use App\Domain\ValueObject\Task\TaskStatus;
use App\Domain\ValueObject\Task\TaskTitle;

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
