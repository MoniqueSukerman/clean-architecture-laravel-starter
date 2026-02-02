<?php

namespace App\Application\Task\Output;

class UpdateTaskOutput
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
