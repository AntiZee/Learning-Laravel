<?php

namespace App\Services;

interface todolistService
{
    public function saveToDo(string $id, string $todo): void;
    public function gettodolist(): array;
    public function removeToDo(string $todoId);
}
