<?php

namespace App\Services\Implementation;

use App\Services\todolistService;
use Illuminate\Support\Facades\Session;

class todolistServiceImplementation implements todolistService
{
    public function saveToDo(string $id, string $todo): void
    {
        if (!Session::exists('todolist')) {
            Session::put('todolist', []);
        }
        Session::push('todolist', [
            'id' => $id,
            'todo' => $todo
        ]);
    }
    public function gettodolist(): array
    {
        return Session::get('todolist', []);
    }
    public function removeToDo(string $todoId)
    {
        $todolist = Session::get('todolist');
        foreach ($todolist as $index => $value) {
            if ($value['id'] == $todoId) {
                unset($todolist[$index]);
                break;
            }
        }
        Session::put('todolist', $todolist);
    }
}