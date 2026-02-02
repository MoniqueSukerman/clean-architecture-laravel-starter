<?php

namespace App\Application\Task\Output;

class UpdateOutput
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
