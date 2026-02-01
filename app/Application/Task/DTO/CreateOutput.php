<?php

namespace App\Application\Task\DTO;

class CreateOutput
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
