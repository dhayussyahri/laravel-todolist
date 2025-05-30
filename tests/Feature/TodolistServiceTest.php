<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\TodolistSerice;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodolistServiceTest extends TestCase
{
    private TodolistSerice $todolistSerice;
    protected function setUp(): void
    {
        parent::setUp();

        $this->todolistSerice = $this->app->make(TodolistSerice::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistSerice);
    }

    public function testSaveTodo()
    {
        $this->todolistSerice->saveTodo("1", "ganteng");
        $todolist = Session::get("todolist");
        foreach($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("ganteng", $value['todo']);

        }
    }
}
