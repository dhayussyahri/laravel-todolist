<?php

namespace App\Http\Controllers;

use App\Services\TodolistSerice;
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

    }
    public function removeTodo(Request $request, string $todoId)
    {

    }
}
