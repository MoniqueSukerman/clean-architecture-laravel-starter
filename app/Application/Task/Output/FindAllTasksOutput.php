<?php

namespace App\Application\Task\Output;

class FindAllTasksOutput
{
    /**
     * @param FindTaskOutput[] $tasks
     */
    public function __construct(
        public array $tasks,
    ) {
    }

}
