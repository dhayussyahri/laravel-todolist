<?php

namespace App\Http\Controllers;

use App\Services\TodolistSerice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private TodolistSerice $todolistSerice;
    public function __construct(TodolistSerice $todolistSerice)
    {
        $this->todolistSerice = $todolistSerice;
    }
    public function todoList(Request $request)
    {
        $todolist = $this->todolistSerice->getTodolist();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }
    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");

        if(empty($todo)){
            $todolist = $this->todolistSerice->getTodolist();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }
        $this->todolistSerice->saveTodo(uniqid(), $todo);
        return redirect()->action([TodolistController::class, 'todoList']);
    }
    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todolistSerice->removeTodo($todoId);
        return redirect()->action([TodolistController::class, 'todoList']);
    }
}
