<?php

namespace App\Application\Task\Output;

class CreateTaskOutput
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
