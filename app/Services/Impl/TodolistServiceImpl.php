<?php

namespace App\Services\Impl;

use App\Services\TodolistSerice;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistSerice
{
   public function saveTodo(string $id, string $todo): void
   {
      if(!session::exists("todolist")) {
         Session::put("todolist");
      }
      Session::push("todolist", [
         "id" => $id,
         "todo" => $todo
      ]);
   }
}