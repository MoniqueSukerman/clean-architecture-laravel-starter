<?php

namespace App\Domain\Repository\Task;

use App\Domain\Entity\Task\Task;

interface TaskRepository
{
    public function create(Task $task) : Task;
    public function update(Task $task) : Task;
    public function delete(string $id) : void;
    public function find(string $id) : Task;
    public function all() : array;
}
