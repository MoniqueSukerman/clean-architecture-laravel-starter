<?php

namespace App\Application\Task\Output;

class FindAllOutput
{
    /**
     * @param FindOutput[] $tasks
     */
    public function __construct(
        public array $tasks,
    ) {
    }

}
