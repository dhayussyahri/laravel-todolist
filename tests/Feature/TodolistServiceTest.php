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

    public function testGetTodolistEmpty()
    {
        self::assertEquals([], $this->todolistSerice->getTodolist());
    }

    public function testGetTodolistNotEmpty()
    {
        $expected = [
            [
                "id" => "1",
                "todo" => "lalala"
            ],
            [
                "id" => "2",
                "todo" => "yeyeye"
            ]
        ];

        $this->todolistSerice->saveTodo("1", "lalala");
        $this->todolistSerice->saveTodo("2", "yeyeye");
        self::assertEquals($expected, $this->todolistSerice->getTodolist());
    }

    public function testRemoveTodolist()
    {
        $this->todolistSerice->saveTodo("1", "Dhayus");
        $this->todolistSerice->saveTodo("2", "Lelele");

        self::assertEquals(2, sizeof($this->todolistSerice->getTodolist()));

        $this->todolistSerice->removeTodo("3");

        self::assertEquals(2, sizeof($this->todolistSerice->getTodolist()));

        $this->todolistSerice->removeTodo("1");

        $this->assertEquals(1, sizeof($this->todolistSerice->getTodolist()));

        $this->todolistSerice->removeTodo("2");

        $this->assertEquals(0, sizeof($this->todolistSerice->getTodolist()));
    }
}
