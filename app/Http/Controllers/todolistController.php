<?php

namespace App\Http\Controllers;

use App\Services\todolistService;
use Illuminate\Http\Request;

class todolistController extends Controller
{
    private todolistService $todolistService;
    public function __construct(todolistService $todolistService)
    {
        $this->todolistService = $todolistService;        
    }
    public function todolist(Request $request)
    {
        $todolist = $this->todolistService->gettodolist();
        return response()->view('todolist.todolist', [
            'title' =>'To-Do-List',
            'todolist' => $todolist
        ]);
    }
    public function addToDo(Request $request)
    {
        $todo = $request->input('todo');
        if (empty($todo)) {
            $todolist = $this->todolistService->gettodolist();
            return response()->view('todolist.todolist', [
                'title' =>'To-Do-List',
                'todolist' => $todolist,
                'error' => 'Todo is required'
            ]);
        }
        $this->todolistService->saveToDo(uniqid(), $todo);
        return redirect()->action([todolistController::class, 'todolist']);
    }
    public function removetodolist(Request $request, string $todoId)
    {
        
    }
}