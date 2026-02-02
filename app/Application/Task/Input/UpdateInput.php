<?php

namespace App\Application\Task\Input;

class UpdateInput
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
    ) {
    }

}
