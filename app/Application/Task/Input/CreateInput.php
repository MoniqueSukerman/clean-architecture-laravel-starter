<?php

namespace App\Application\Task\Input;

class CreateInput
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
