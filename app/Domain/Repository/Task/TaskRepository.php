<?php

namespace App\Domain\Repository\Task;

use App\Domain\Entity\Task\Task;

interface TaskRepository
{
    public function create(Task $task) : Task;
    public function update(Task $task) : Task;
    public function delete(Task $task) : void;
    public function find(string $id) : Task;
    public function all() : array;
}
