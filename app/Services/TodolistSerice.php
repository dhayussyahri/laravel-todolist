<?php

namespace App\Services;
interface TodolistSerice
{
   public function saveTodo(string $id, string $todo): void;

   public function getTodolist(): array;

   public function removeTodo(string $todoId);
}