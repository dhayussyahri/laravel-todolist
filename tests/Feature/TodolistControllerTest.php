<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{

    public function testTodolist()
    {
        $this->withSession([
            "user" => "Dhayus",
            "todolist" => [
                "id" => "1",
                "todo" => "dhayus"
            ],
            [
                "id" => "2",
                "todo" => "yeyeye"
            ]
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("dhayus")
            ->assertSeeText("2")
            ->assertSeeText("yeyeye");
    }

}
