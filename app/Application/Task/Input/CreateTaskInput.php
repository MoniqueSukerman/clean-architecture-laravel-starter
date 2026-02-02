<?php

namespace App\Application\Task\Input;

class CreateTaskInput
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
